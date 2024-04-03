<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Item;
use App\Models\ShareProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    function dataMaterial(Request $req) {
        $category = Category::where('name',$req->q)->get();
        return response()->json($category);
    }

    function profile() {
        $enquiry = Enquiry::get();
        return view('user.profile',compact('enquiry'));
    }
    function shareProduct(Request $req) {
        ShareProduct::create(['item_id'=>$req->item_id,'customer_id'=>Auth::user()->id]);
        return response()->json(['message' => 'Berhasil Mencopy Link','id'=>$req->item_id,'type'=>'success']);
    }
}