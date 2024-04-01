<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportWishlistController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.report.report-';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Wishlist::all();
        $item = Item::orderBy('id', 'asc')->get();
        return view($this->path.'wishlist',compact('data', 'item'));
    }
   
}