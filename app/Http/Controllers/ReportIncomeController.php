<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = Item::orderBy('id', 'desc');
        $enquiry = Enquiry::orderBy('id', 'desc');
        return view($this->path.'income',compact('data', 'enquiry'));
    }
   
}