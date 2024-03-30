<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;

class HomeController extends Controller
{

    private string $path;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    function index() {
        $category = Category::get();
        $item = Item::get();
        return view('welcome',compact('category','item'));
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