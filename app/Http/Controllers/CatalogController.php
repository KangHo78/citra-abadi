<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    private string $path;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    function index(Request $req)
    {
        // return $req->category;


        $dataString = $req->category;
        $dataArray = explode(",", $dataString);
        // print_r($dataArray);
        // return $dataArray;

        $dataCategoryRaw = Category::select('id')->whereIn('name',$dataArray)->get()->toArray();
        // return $dataCategory;
        $dataCategory = [];

        foreach ($dataCategoryRaw as $key => $el) {
            $dataCategory[] = $el['id'];
        }

        $category = Category::get();

        $item = Item::where(function ($q) use ($req,$dataCategory) {
            if ($req->has('q')) {
                $q->where('name', 'like', '%' . $req->q . '%');
            }
            if ($req->has('category')) {
                $q->whereIn('category_id', $dataCategory);
            }
        })->get();
        return view('user.catalog', compact('category', 'item'));
    }
    function show()
    {
        $data = [];
        return view($this->path . '/show', compact('data'));
    }
    function create()
    {
        $data = [];
        return view($this->path . '/create', compact('data'));
    }
    function store()
    {
    }
    function edit()
    {
        $data = [];
        return view($this->path . '/edit', compact('data'));
    }
    function update()
    {
    }
    function print()
    {
        $data = [];
        return view($this->path . '/print', compact('data'));
    }
    function destroy()
    {
    }
}
