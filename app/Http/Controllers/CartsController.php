<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\orderInvoice;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Enquiry;
use App\Models\EnquiryDetail;
use App\Models\Item;
use App\Models\Material;
use App\Models\Size;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartsController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
    }


    function cart()
    {

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.cart', compact('carts'));
    }


    function addToCart(Request $req)
    {
        $response = '';
        $type = '-';

        $qtyTotal = 0;
        for ($i = 0; $i < count($req->item); $i++) {
            if ($req->qty[$i] != null || $req->qty[$i] != '') {
                $qtyTotal += $req->qty[$i];
                // checking exist
                $checkingCartExist = Cart::where('item_id', $req->item[$i])
                    ->where('item_detail_id', $req->item_detail[$i])->count();

                if ($checkingCartExist) {
                    Cart::where('item_id', $req->item[$i])
                        ->where('item_detail_id', $req->item_detail[$i])
                        ->update(['qty' => $req->qty[$i]]);
                } else {
                    Cart::create([
                        'user_id' => Auth::user()->id,
                        'item_id' => $req->item[$i],
                        'item_detail_id' => $req->item_detail[$i],
                        'qty' => $req->qty[$i],
                    ]);
                }
                $response = 'Berhasil Menambahkan Keranjang';
                $type = 'success';
            }
        }

        if ($qtyTotal == 0) {
            $response = 'Harap Isi QTY Min 1';
            $type = 'warning';
        }

        $cart = checkCarts();


        return response()->json(['message' => $response, 'type' => $type,'cart'=>$cart]);
    }

    function removeItemCart(Request $req)
    {

        try {
            Cart::where('id', $req->id)
                ->delete();
            return response()->json(['message' => 'Berhasil Menghapus Dari Keranjang', 'id' => $req->id, 'type' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'id' => $req->id, 'type' => 'error']);
        }
    }

    function addQuantityItemCart(Request $req)
    {
        try {
            Cart::where('id', $req->id)->update(['qty' => $req->qty]);
            return response()->json(['message' => 'Berhasil Merubah Qty', 'id' => $req->id, 'type' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'id' => $req->id, 'type' => 'error']);
        }
    }

    function decreaseQuantityItemCart(Request $req)
    {
        try {
            Cart::where('id', $req->id)->update(['qty' => $req->qty]);
            return response()->json(['message' => 'Berhasil Merubah Qty', 'id' => $req->id, 'type' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'id' => $req->id, 'type' => 'error']);
        }
    }

    function syncQuantityItemCart(Request $req)
    {
        try {
            Cart::where('id', $req->id)->update(['qty' => $req->qty]);
            return response()->json(['message' => 'Berhasil Merubah Qty', 'id' => $req->id, 'type' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'id' => $req->id, 'type' => 'error']);
        }
    }

    function getLastGeneratedCode() {
        // Di sini, Anda akan mengambil kode terakhir dari database
        // sebagai contoh, kita hanya mengembalikan kode statis untuk simulasi
        // Anda perlu menggantinya dengan logika yang sesuai dengan aplikasi Anda
    
        // Misalnya, kode terakhir disimpan dalam tabel 'codes'
        $lastCode = Enquiry::orderBy('id', 'desc')->value('code');
    
        return $lastCode;
    }

    function placeOrder(Request $req)
    {
        try {
            $cartData = checkCarts();
            $cart = $cartData['carts'];
            // return $req->all();
            for ($i = 0; $i < count($req->id); $i++) {
                Cart::where('id', $req->id[$i])->update(['qty' => $req->qty[$i], 'description' => $req->description[$i]]);
            }


            // Mendapatkan tanggal hari ini dalam format Ymd (tahun-bulan-tanggal)
            $currentDate = date('Ymd');

            // Mendapatkan angka terakhir dari kode sebelumnya (jika ada)
            $lastCode = $this->getLastGeneratedCode(); // Fungsi ini perlu diimplementasikan untuk mengambil kode terakhir dari database atau sumber lainnya
            $lastNumber = $lastCode ? (int)substr($lastCode, -5) : 0;

            // Lakukan increment pada angka terakhir
            $newNumber = $lastNumber + 1;

            // Format angka baru menjadi panjang tetap (5 digit dengan angka 0 di depan jika perlu)
            $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

            // Gabungkan bagian-bagian tersebut menjadi satu string
            $newCode = 'ENQ' . $currentDate . $formattedNumber;

            // return $newCode;

            $parent = Enquiry::create([
                'code'=>$newCode,
                'date'=>date('Y-m-d'),
                'desc'=>'-',
                'status'=>1,
                'customer_id'=>Auth::user()->id,
                'price'=>0,
                'ppn_type'=>'NON',
                'ppn_percentage'=>0,
                'ppn_value'=>0,
                'discount'=>0,
                'grand_total'=>0,
            ]);
            

            for ($i=0; $i <count($cart) ; $i++) { 
                EnquiryDetail::create([
                    'enquiry_id'=>$parent->id,
                    'item_id'=>$cart[$i]->item_id,
                    'item_detail_id'=>$cart[$i]->item_detail_id,
                    'item_price'=>0,
                    'item_quantity'=>$cart[$i]->qty,
                    'description' => '-',
                ]);
            }

        
            // remove cart 
            Cart::where('user_id',Auth::user()->id)->delete();

            // send email
            Mail::to('denyprasetyo41@gmail.com')->send(new orderInvoice($cart,$parent));

            return response()->json(['message' => 'Berhasil Melakukan Pembelian','id'=>$req->id,'type'=>'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'id' => $req->id, 'type' => 'error']);
        }
    }

}
