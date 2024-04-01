<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Item;
use App\Models\Material;
use App\Models\Size;
use App\Models\Spec;

class ProductDetailsController extends Controller
{

    private string $path;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    function index($id) {
        $category = Category::get();
        $material = Material::get();
        $spec = Spec::get();
        $class = Classes::get();
        $conn = Conn::get();
        $size = Size::get();
        $item = Item::with('item_detail')->findOrFail($id);
        return view('user.product_details',compact('category','item','material','spec','class','conn','size'));
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