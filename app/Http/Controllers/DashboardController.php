<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Enquiry::where('id', '>=', 1);
        if($request->date_start) {
            $data = $data->where('created_at', '>=', $request->date_start);
        }
        if($request->date_end) {
            $data = $data->where('created_at', '<=', $request->date_end);
        }
        return view('dashboard',compact('data'));
    }
   
}