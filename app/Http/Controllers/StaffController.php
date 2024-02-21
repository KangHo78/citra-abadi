<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StaffController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.settings.staff.';
    }

    function index() {
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function show() {
        $data = [];
        return view($this->path.'/show',compact('data'));
    }
    function create() {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store() {
    
    }
    function edit() {
        $data = [];
        return view($this->path.'/edit',compact('data'));
    }
    function update() {
    
    }
    function print() {
        $data = [];
        return view($this->path.'/print',compact('data'));
    }
    function destroy() {
    
    }
}