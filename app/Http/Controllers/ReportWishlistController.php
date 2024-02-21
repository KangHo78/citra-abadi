<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ReportWishlistController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.report.report-';
    }

    function index() {
        $data = [];
        return view($this->path.'wishlist',compact('data'));
    }
   
}