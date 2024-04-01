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
        $category = Category::get();

        $item = Item::where(function ($q) use ($req) {
            if ($req->has('q')) {
                $q->where('name', 'like', '%' . $req->q . '%');
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
