<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.inventory.item.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Item::orderBy('id', 'desc');
        $sku = "";
        $name = "";
        $category_id = 0;
        $subcategory_id_1 = 0;
        $subcategory_id_2 = 0;
        $subcategory_id_3 = 0;
        $subcategory_id_4 = 0;
        $subcategory_id_5 = 0;
        $subcategory_id_6 = 0;
        $brand = "";
        if($request->filled('sku')) {
            $data = $data->where('sku', 'like', self::like($request->sku));
        }
        if($request->filled('name')) {
            $data = $data->where('name', 'like', self::like($request->name));
        }
        // if() {
        //     $data = $data->where('code', 'like', self::like($request->code));
        // }
        if($request->filled('category_id')) {
            $category_id_param = $request->category_id;
            $data = $data->whereHas('category', function($query) use ($category_id_param)
            {
                $query->where('id', $category_id_param);

                });
        }
        if($request->filled('subcategory_id_1')) {
            $subcategory_id_1_param = $request->subcategory_id_1;
            $data = $data->whereHas('subcategory_1', function($query) use ($subcategory_id_1_param)
            {
                $query->where('id', $subcategory_id_1_param);

                });
        }
        if($request->filled('subcategory_id_2')) {
            $subcategory_id_2_param = $request->subcategory_id_2;
            $data = $data->whereHas('subcategory_2', function($query) use ($subcategory_id_2_param)
            {
                $query->where('id', $subcategory_id_2_param);

                });
        }
        if($request->filled('subcategory_id_3')) {
            $subcategory_id_3_param = $request->subcategory_id_3;
            $data = $data->whereHas('subcategory_3', function($query) use ($subcategory_id_3_param)
            {
                $query->where('id', $subcategory_id_3_param);

                });
        }
        if($request->filled('subcategory_id_4')) {
            $subcategory_id_4_param = $request->subcategory_id_4;
            $data = $data->whereHas('subcategory_4', function($query) use ($subcategory_id_4_param)
            {
                $query->where('id', $subcategory_id_4_param);

                });
        }
        if($request->filled('subcategory_id_5')) {
            $subcategory_id_5_param = $request->subcategory_id_5;
            $data = $data->whereHas('subcategory_5', function($query) use ($subcategory_id_5_param)
            {
                $query->where('id', $subcategory_id_5_param);

                });
        }
        if($request->filled('subcategory_id_6')) {
            $subcategory_id_1_param = $request->subcategory_id_6;
            $data = $data->whereHas('subcategory_6', function($query) use ($subcategory_id_6_param)
            {
                $query->where('id', $subcategory_id_6_param);

                });
        }
        if($request->filled('brand')) {
            $brand_param = $request->brand;
            $data = $data->whereHas('brand', function($query) use ($brand_param)
            {
                Log::info($brand_param);
                $query->where('id', $brand_param);

                });
        }

        $data = $data->get();
        
        if($request->dataTable) {
            // $json_encode_data = json_encode($data);
            // Log::info($json_encode_data);
            // $json_decode_data = json_decode($json_encode_data, true);
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group mb-1">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" style="">
                            <a href="'.route('item.show',$row->id).'"
                                class="dropdown-item">
                                <i class="bi bi-eye text-primary"></i>
                                <b class="p-2">Lihat</b>
                            </a>
                            <a href="'.route('item.edit',$row->id).'"
                                class="dropdown-item">
                                <i class="bi bi-pencil text-warning"></i>
                                <b class="p-2">Ubah</b>
                            </a>
                            
                        </div>
                    </div>
                </div>';
                    return $btn;
                })
                ->addColumn('sku', function($row){
                    return $row->sku;
                })
                ->addColumn('name', function($row){
                    return $row->name;
                })
                ->addColumn('brand', function($row){
                    return $row->brand->name;
                })
                ->addColumn('category_id', function($row){
                    return $row->category->name;
                })
                ->addColumn('subcategory_id_1', function($row){
                    try{
                    return $row->subcategory_1->name;
                    } catch(\Throwable $e) {
                        return "";
                    }
                })
                ->addColumn('subcategory_id_2', function($row){
                    try{
                    return $row->subcategory_2->name;
                    } catch(\Throwable $e) {
                        return "";
                    }
                })
                ->addColumn('subcategory_id_3', function($row){
                    try{
                        return $row->subcategory_3->name;
                        } catch(\Throwable $e) {
                            return "";
                        }                })
                ->addColumn('subcategory_id_4', function($row){
                    try{
                        return $row->subcategory_4->name;
                        } catch(\Throwable $e) {
                            return "";
                        }                })
                ->addColumn('subcategory_id_5', function($row){
                    try{
                        return $row->subcategory_5->name;
                        } catch(\Throwable $e) {
                            return "";
                        }                })
                ->addColumn('subcategory_id_6', function($row){
                    try{
                        return $row->subcategory_6->name;
                        } catch(\Throwable $e) {
                            return "";
                        }                })
                ->addColumn('material', function($row){
                    try{
                        return $row->material->name;
                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->addColumn('spec', function($row){
                    try{
                        return $row->spec->name;
                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->addColumn('class', function($row){
                    try{
                        return $row->class->name;
                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->addColumn('conn', function($row){
                    try{
                        return $row->conn->name;
                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->addColumn('size', function($row){
                    try{
                        return $row->size->name;
                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->addColumn('desc', function($row){
                    try{
                        return $row->desc->name;
                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->addColumn('photos', function($row){
                    try{
                        return '<img src="'.json_decode($item->photos, true)[0].'" width="100px"></img>';

                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->rawColumns(['action', 'date', 'num_product', 'customer', 'branch', 'price', 'status', 'payment', 'shipping', 'payment_status'])
                ->make(true);
            // Log::info('jdd '.json_encode($json_decode_data));
            return $json_decode_data;
        }
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'subcategory_id_1', 'subcategory_id_2', 'subcategory_id_3', 'subcategory_id_4', 'subcategory_id_5', 'subcategory_id_6', 'brand'));
    }
    function show(Request $request, $id) {
        Log::info($id);
        $data = Item::where('id', $id)->first();
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $item = new Item;
        $item->name = $request->name;
        $item->sku = $request->sku;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->category_id = $request->category_id;
        if($request->subcategory_id_1) {
            $item->subcategory_id_1 = $request->subcategory_id_1;
        }
        if($request->subcategory_id_2) {
        $item->subcategory_id_2 = $request->subcategory_id_2;
        }
        if($request->subcategory_id_3) {
        $item->subcategory_id_3 = $request->subcategory_id_3;
        }
        if($request->subcategory_id_4) {
        $item->subcategory_id_4 = $request->subcategory_id_4;
        }
        if($request->subcategory_id_5) {
        $item->subcategory_id_5 = $request->subcategory_id_5;
        }
        if($request->subcategory_id_6) {
        $item->subcategory_id_6 = $request->subcategory_id_6;
        }
        if($request->photos) {
            $item->photos = $request->photos;
        }
        $item->save();
        $data = Item::orderBy('id', 'desc');
        $sku = "";
        $name = "";
        $category_id = 0;
        $subcategory_id_1 = 0;
        $subcategory_id_2 = 0;
        $subcategory_id_3 = 0;
        $subcategory_id_4 = 0;
        $subcategory_id_5 = 0;
        $subcategory_id_6 = 0;
        $brand = "";
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'subcategory_id_1', 'subcategory_id_2', 'subcategory_id_3', 'subcategory_id_4', 'subcategory_id_5', 'subcategory_id_6', 'brand'));
    }
    function edit(Request $request, $id) {
        Log::info($id);
        $data = Item::findOrFail($id)->first();
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request, $id) {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->sku = $request->sku;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->category_id = $request->category_id;
        if($request->subcategory_id_1) {
        $item->subcategory_id_1 = $request->subcategory_id_1;
        }
        if($request->subcategory_id_2) {
        $item->subcategory_id_2 = $request->subcategory_id_2;
        }
        if($request->subcategory_id_3) {
        $item->subcategory_id_3 = $request->subcategory_id_3;
        }
        if($request->subcategory_id_4) {
        $item->subcategory_id_4 = $request->subcategory_id_4;
        }
        if($request->subcategory_id_5) {
        $item->subcategory_id_5 = $request->subcategory_id_5;
        }
        if($request->subcategory_id_6) {
        $item->subcategory_id_6 = $request->subcategory_id_6;
        }
        if($request->photos) {
            $item->photos = $request->photos;
        }
        $item->save();
        $data = Item::orderBy('id', 'desc');
        $sku = "";
        $name = "";
        $category_id = 0;
        $subcategory_id_1 = 0;
        $subcategory_id_2 = 0;
        $subcategory_id_3 = 0;
        $subcategory_id_4 = 0;
        $subcategory_id_5 = 0;
        $subcategory_id_6 = 0;
        $brand = "";
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'subcategory_id_1', 'subcategory_id_2', 'subcategory_id_3', 'subcategory_id_4', 'subcategory_id_5', 'subcategory_id_6', 'brand'));
    }
    function print(Request $request) {
        $data = Item::where('id', $request->id);
        return view($this->path.'/print',compact('data'));
    }
    function destroy(Request $request) {
        Item::find($request->id)->delete();
        $data = Item::all();
        return view($this->path.'/index',compact('data'));
    }


}