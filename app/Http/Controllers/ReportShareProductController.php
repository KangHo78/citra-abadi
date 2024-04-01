<?php

namespace App\Http\Controllers;

use App\Models\ShareProduct;
use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportShareProductController extends Controller
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
        $data = ShareProduct::orderBy('id', 'desc');
        $item = Item::orderBy('id', 'ASC')->get();
        return view($this->path.'share-product',compact('data', 'item'));
    }
   
}