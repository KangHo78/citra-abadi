<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        
        $data = Brand::orderBy('id', 'DESC')->get();
        if($request->name) {
            $data = Brand::where('name', 'like', self::like($request->name))->get();
            $name = $request->name;
            return view($this->path.'/index',compact('data', 'name'))->render();
        }
        
        return view($this->path.'/index',compact('data'))->render();
    }
    // function search(Request $request) {
    //     Log::info($request->name);
    //     if($request->name) {
    //         $data = Brand::where('name', 'like', self::like($request->name))->get();
    //     }
    //     Log::info(json_encode($data));
    //     return view('admin.inventory.brand.datatable', compact('data'))->render();
    // }
    function show(Request $request) {
        $data = Brand::where('id', $request->id)->get();
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        if(empty($request->name)) {
            $error = 'Nama Merek Kosong';
            $data = [];
            return view($this->path.'/create',compact('data', 'error'));
        }
        $brand_check = Brand::where('name', $request->name)->first();
        Log::info(json_encode($brand_check));
        Log::info('BC: '. empty($brand_check));
        if(empty($brand_check)) {
            try{
            Log::info('brand_test');
            $brand = new Brand;
            $brand->name = $request->name;
            
            $brand->save();
            $data = Brand::orderBy('id', 'DESC')->get();
            return view($this->path.'/index',compact('data'));
            } catch(\Throwable $e) {
                $error = $e->getMessage();
                $data = [];
                return view($this->path.'/create',compact('data', 'error'));
            }
        } else {
                $error = 'Nama Merek Sudah Ada';
                $data = [];
                return view($this->path.'/create',compact('data', 'error'));
        }
    }
    function edit(Request $request, $id) {
        // Log::info(json_encode($request->input()));
        Log::info($id);
        $data = Brand::findOrFail($id);
        Log::info(json_encode($data));
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request, $id) {
        try{
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();
        $data = Brand::orderBy('id', 'DESC')->get();
        return view($this->path.'/index',compact('data'));
        } catch(\Throwable $e) {
            $error = $e->getMessage();
            $brand = Brand::findOrFail($id);
            return view($this->path.'/edit',compact('data', 'brand'));
        }
    }
    // function print(Request $request) {
    //     $data = Brand::where('id', $request->id);
    //     return view($this->path.'/print',compact('data'));
    // }
    // function destroy(Request $request, $id) {
    //     Log::info($id);
    //     Brand::findOrFail($id)->delete();
    //     $data = Brand::all()->get();
    //     return view($this->path.'/index',compact('data'));
    // }
}