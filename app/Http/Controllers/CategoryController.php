<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.inventory.category.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Category::orderBy('id', 'asc');	
        if($request->name) {
            $data = $data->where('name', 'like', self::like($request->name));
        }
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = Category::where('id', $request->id);
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $category = new Category;
        $category->name = $request->name;
        $category->parent_category_id = $request->parent_category_id;
        if($request->image) {
            $category->image = $request->image;
        }
        $category->save();
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request) {
        $data = Category::where('id', $request->id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $category = Category::where('id', $request->id)->get();
        $category->name = $request->name;
        $category->parent_category_id = $request->parent_category_id;
        if($request->image) {
            $category->image = $request->image;
        }
        $category->save();
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function print(Request $request) {
        $data = Category::where('id', $request->id);
        return view($this->path.'/print',compact('data'));
    }
    function destroy(Request $request) {
        Category::find($request->id)->delete();
        $data = Category::all();
        return view($this->path.'/index',compact('data'));
    }
}