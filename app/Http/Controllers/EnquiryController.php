<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\EnquiryDetail;
use App\Models\Item;
use App\Models\ItemDetail;
use App\Mail\orderEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EnquiryController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.transaction.sales.';
    }

    function like($text)
    {
        return '%' . $text . '%';
    }

    function index(Request $req)
    {
        $data = Enquiry::where(function($q) use ($req){
            if ($req->date_start != '' || $req->date_start != null) {
                $q->where('date', '>=', date("Y-m-d", strtotime($req->date_start)));
            }
            if ($req->date_end != '' || $req->date_end != null) {
                $q->where('date', '<=', date("Y-m-d", strtotime($req->date_end)));
            }
            if ($req->code != '' || $req->code != null) {
                $q->where('code', 'like', self::like($req->code));
            }
            if ($req->customer != '' || $req->customer != null) {
                $q->where('customer_id', '>=', $req->customer);
            }
        })->get();
  
        $customer = User::get();
        return view($this->path . '/index', compact('data','customer'));
    }
    function show(Request $request, $id) {
        $data = ['data' => Enquiry::with('enquiry_detail', 'enquiry_detail.item', 'enquiry_detail.item_detail')->where('id', $id)->first(), 'customer' => User::get(), 'item' => Item::get(), 'itemDetail' => ItemDetail::get()];
        return view($this->path.'/show',compact('data'));
    }
    function getLastGeneratedCode()
    {
        // Di sini, Anda akan mengambil kode terakhir dari database
        // sebagai contoh, kita hanya mengembalikan kode statis untuk simulasi
        // Anda perlu menggantinya dengan logika yang sesuai dengan aplikasi Anda

        // Misalnya, kode terakhir disimpan dalam tabel 'codes'
        $lastCode = Enquiry::orderBy('id', 'desc')->value('code');

        return $lastCode;
    }
    function create(Request $request)
    {
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

        $data = ['code' => $newCode, 'customer' => User::get(), 'item' => Item::get(), 'itemDetail' => ItemDetail::get()];

        return view($this->path . '/create', compact('data'));
    }

    function store(Request $req)
    {
        // dd($req->all());
        // return $req->all();
        $parent = Enquiry::create([
            'code' => $req->code,
            'date' => date("Y-m-d", strtotime($req->date)),
            'desc' => $req->desc,
            'status' => $req->status,
            'customer_id' => $req->customer_id,
            'price' => str_replace(",", "", $req->price),
            'ppn_value' => str_replace(",", "", $req->ppn_value),
            'ppn_type' => $req->ppn_type ?? 'NON',
            'ppn_percentage' => $req->ppn_percentage,
            'discount' => str_replace(",", "", $req->discount_value),
            // 'discount_type'=>$req->discount_type,
            'grand_total' => str_replace(",", "", $req->total_price),
        ]);


        for ($i = 0; $i < count($req->dt); $i++) {
            EnquiryDetail::create([
                'enquiry_id' => $parent->id,
                'item_id' => ItemDetail::where('id', $req->item_detail_id[$i])->first()->item_id,
                'item_detail_id' => $req->item_detail_id[$i],
                'item_price' => str_replace(",", "", $req->price_dt[$i]),
                'item_quantity' => str_replace(",", "", $req->qty_dt[$i]),
                'description' => $req->description_dt[$i],
            ]);
        }

        return redirect()->route('transaction.sales.index');
        // return view($this->path . '/index', compact('data'));
    }
    function edit($id)
    {
        // $data = ;
        $data = ['data' => Enquiry::with('enquiry_detail', 'enquiry_detail.item', 'enquiry_detail.item_detail')->where('id', $id)->first(), 'customer' => User::get(), 'item' => Item::get(), 'itemDetail' => ItemDetail::get()];
        return view($this->path . '/edit', compact('data'));
    }
    function update(Request $req)
    {

        // return $req->all();
        $parent = Enquiry::where('id',$req->id)->update([
            'date' => date("Y-m-d", strtotime($req->date)),
            'desc' => $req->desc ?? '-',
            'status' => $req->status,
            'customer_id' => $req->customer_id,
            'price' => str_replace(",", "", $req->price),
            'ppn_value' => str_replace(",", "", $req->ppn_value),
            'ppn_type' => $req->ppn_type ?? 'NON',
            'ppn_percentage' => $req->ppn_percentage,
            'discount' => str_replace(",", "", $req->discount_value),
            'grand_total' => str_replace(",", "", $req->total_price),
        ]);


        EnquiryDetail::where('enquiry_id',$req->id)->whereNotIn('id',$req->dt)->delete();

        for ($i = 0; $i < count($req->dt); $i++) {
            if ($req->dt[$i] != 0) {
                EnquiryDetail::where('id',$req->dt[$i])->update([
                    // 'enquiry_id' => $parent->id,
                    'item_id' => ItemDetail::where('id', $req->item_detail_id[$i])->first()->item_id,
                    'item_detail_id' => $req->item_detail_id[$i],
                    'item_price' => str_replace(",", "", $req->price_dt[$i]),
                    'item_quantity' => str_replace(",", "", $req->qty_dt[$i]),
                    'description' => $req->description_dt[$i],
                ]);
            }else{
                EnquiryDetail::create([
                    'enquiry_id' => $req->id,
                    'item_id' => ItemDetail::where('id', $req->item_detail_id[$i])->first()->item_id,
                    'item_detail_id' => $req->item_detail_id[$i],
                    'item_price' => str_replace(",", "", $req->price_dt[$i]),
                    'item_quantity' => str_replace(",", "", $req->qty_dt[$i]),
                    'description' => $req->description_dt[$i],
                ]);
            }

            
        }

        return redirect()->route('transaction.sales.index');
    }
    function print($id)
    {
        $data = Enquiry::with('enquiry_detail')->where('id', $id)->first();
        // return $data;
        return view($this->path . '/print', compact('data'));
    }
    function email($id)
    { //TODO:
        $data = Enquiry::where('id', $id)->first();
        Log::info(json_encode($id));
        Mail::to($data->customer->email)->send(new orderEnquiry($data));
        return view($this->path . '/print', compact('data'));
    }
    function destroy($id)
    {
        Enquiry::where('id',$id)->update([
            'status'=>4
        ]);
        return response()->json(['message' => 'Berhasil Merubah Status','type'=>'success']);
    }
    function getDataItemDetail(Request $request)
    {

        // return ItemDetail::with('item')->get();


        $searchTerm = $request->input('q'); // Ambil input pencarian dari request
        // return $searchTerm;
        $data = ItemDetail::where('sku', 'like', '%' . $searchTerm . '%')
            // ->orWhere('sku', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('item', function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->get();
        // return $data;
        $formattedData = [];

        foreach ($data as $item) {
            $formattedData[] = [
                'id' => $item->id,
                'text' => $item->item->name . ' (' . $item->sku . ')',
                'price' => number_format($item->price, 0, '.', ','),
            ];
        }

        return response()->json($formattedData);
    }
}
