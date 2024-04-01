<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Item;
use App\Models\Material;
use App\Models\Size;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
    }


    function checkout(Request $req)
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


        return response()->json(['message' => $response, 'type' => $type]);

        // return $req->all();
    }
}
