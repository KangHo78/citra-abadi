<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportUserController extends Controller
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
        $data = User::orderBy('id', 'desc')->whereNot('code', null)->whereNot('code', '0')->get();	
        return view($this->path.'user',compact('data'));
    }
   
}