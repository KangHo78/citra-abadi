<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Item;
use App\Models\Material;
use App\Models\Size;
use App\Models\Spec;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    private string $path;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    function index()
    {
        $data = Wishlist::where('customer_id', Auth::user()->id)->get();
        return view('user.wishlist', compact('data'));
    }
    function addToWishlist(Request $req)
    {
        try {
            // checking Wishlist
            if (auth::check()) {
                # code...

                $checkWishlist = Wishlist::where('item_id', $req->item_id)->where('customer_id', Auth::user()->id)->count();

                if ($checkWishlist > 0) {
                    $totalWishlist = getWishlistByItem($req->item_id);

                    return response()->json(['message' => 'Sudah Ada Pada Wishlist', 'id' => $req->item_id, 'totalWishlist' => $totalWishlist, 'type' => 'warning']);
                } else {
                    Wishlist::create(['item_id' => $req->item_id, 'customer_id' => Auth::user()->id]);
                }
                $totalWishlist = getWishlistByItem($req->item_id);

                return response()->json(['message' => 'Berhasil Menambahkan Ke Wishlist', 'id' => $req->item_id, 'totalWishlist' => $totalWishlist, 'type' => 'success']);
            } else {
                return response()->json(['message' =>'Harus Login Dahulu', 'id' => $req->item_id, 'totalWishlist' => Wishlist::where('item_id', $req->item_id)->count(), 'type' => 'error']);
            }
        } catch (\Throwable $th) {
            $totalWishlist = getWishlistByItem($req->item_id);

            return response()->json(['message' => $th->getMessage(), 'id' => $req->item_id, 'totalWishlist' => $totalWishlist, 'type' => 'error']);
        }
    }
}
