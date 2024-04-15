<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $date_start = null;
        $date_end = null;
        $data = Wishlist::orderBy('id', 'desc');
        $item = Item::orderBy('id', 'asc')->get();
         
        if($request->date_start) {
            $date_start = Carbon::createFromFormat('d/m/Y', $request->date_start);
            $data = $data->where('created_at', '>=', $date_start);
            $date_start = $date_start->format('d/m/Y');
        }
        if($request->date_end) {
            $date_end = Carbon::createFromFormat('d/m/Y', $request->date_end);
            $date_end_1 = Carbon::createFromFormat('d/m/Y', $request->date_end);
            $data = $data->where('created_at', '<=', $date_end_1->addDay(1));
            $date_end = $date_end->format('d/m/Y');
        }
        return view($this->path.'wishlist',compact('data', 'item', 'date_start', 'date_end'));
    }
   
}