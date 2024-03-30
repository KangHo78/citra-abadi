<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.inventory.brand.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Brand::orderBy('id', 'asc');	
        if($request->name) {
            $data = $data->where('name', 'like', self::like($request->name));
        }
        
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = Brand::where('id', $request->id);
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request) {
        $data = Brand::where('id', $request->id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $brand = Brand::where('id', $request->id)->get();
        $brand->name = $request->name;
        $brand->save();
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    // function print(Request $request) {
    //     $data = Brand::where('id', $request->id);
    //     return view($this->path.'/print',compact('data'));
    // }
    function destroy(Request $request) {
        Brand::find($request->id)->delete();
        $data = Brand::all();
        return view($this->path.'/index',compact('data'));
    }
}