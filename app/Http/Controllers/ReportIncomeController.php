<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ReportIncomeController extends Controller
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
        $date_end_1 = null;
        $data = Item::orderBy('id', 'desc')->get();
        $enquiry = Enquiry::orderBy('id', 'desc');
        if($request->date_start) {
            $date_start = Carbon::createFromFormat('d/m/Y', $request->date_start);
            $enquiry = $enquiry->where('created_at', '>=', $date_start);
            $date_start = $date_start->format('d/m/Y');
        }
        if($request->date_end) {
            $date_end = Carbon::createFromFormat('d/m/Y', $request->date_end);
            $date_end_1 = Carbon::createFromFormat('d/m/Y', $request->date_end);
            $enquiry = $data->where('created_at', '<=', $date_end_1->addDay(1));
            $date_end = $date_end->format('d/m/Y');
        }
        Log::info($date_start);
        return view($this->path.'income',compact('data', 'enquiry', 'date_start', 'date_end', 'date_end_1'));
    }
   
}