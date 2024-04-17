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
        $date_start = null;
        $date_end = null;
        if($request->date_start) {
            $date_start = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date_start);
            $data = $data->where('created_at', '>=', $date_start);
        }
        if($request->date_end) {
            $date_end = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date_end);
            if($request->date_start) {
                if($date_end < $date_start) {
                    $date_temp = $date_start;
                    $date_start = $date_end;
                    $date_end = $date_temp;
                }
            }
            $data = $data->where('created_at', '<=', $date_end);
        }
        if(!empty($date_start)) {
        $date_start = $date_start->format('d/m/Y');
        }
        if(!empty($date_end)) {
        $date_end = $date_end->format('d/m/Y');
        }
        return view('dashboard',compact('data', 'date_start', 'date_end'));
    }
   
}