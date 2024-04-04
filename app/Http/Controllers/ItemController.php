<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Material;
use App\Models\Spec;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Size;

use App\Models\ItemDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $brand = "";
        $photo = "";
        
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
                ->addColumn('photos', function($row) use($photo){
                    try{
                        $photo = "";
                    if(!empty($row->photos) && $row->photos != '[]') {
                        $item_photo_temp_list = json_decode($row->photos, true)[0];
                        
                        Log::info(json_encode($item_photo_temp_list));
                        $pathToFile = 'public/uploads/items/'.$item_photo_temp_list; // Replace with your file path and disk
                        
                        // $pathToFile = 'public/uploads/items'.$data->photos; // Replace with your file path and disk
        
                        
                        if (Storage::disk('local')->exists($pathToFile)) {
                            // Get a temporary URL for the file (valid for a limited time)
                            // $photo = Storage::disk('local')->url($pathToFile);
                            $photo = asset($pathToFile);
                        }
                        // $photo = asset($photo);
                        // $string=asset();
                        Log::info($photo);
                        Log::info('<img src="'.$photo.'" width="100px"></img>');
                        // Log::info("photodfdfc ".asset($photo));
                    }
                        return '<img src="'.$photo.'" width="100px"></img>';

                        } catch(\Throwable $e) {
                            return "";
                        }
                })
                ->rawColumns(['action', 'date', 'num_product', 'customer', 'branch', 'price', 'status', 'payment', 'shipping', 'payment_status'])
                ->make(true);
            // Log::info('jdd '.json_encode($json_decode_data));
            return $json_decode_data;
        }
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'brand'));
    }
    function show(Request $request, $id) {
        Log::info('ID'.$id);
        $data = Item::where('id', $id)->first();
        $photos = [];
        Log::info($data->photos);
        if(!empty($data->photos) && $data->photos != '[]') {
            $item_photo_temp_list = json_decode($data->photos, true);
            
            Log::info(json_encode($item_photo_temp_list));
            foreach($item_photo_temp_list as $item_photo_temp) {
                $pathToFile = 'public/uploads/items/'.$item_photo_temp; // Replace with your file path and disk
                Log::info($pathToFile);
                // $pathToFile = 'public/uploads/items'.$data->photos; // Replace with your file path and disk

                if (Storage::disk('local')->exists($pathToFile)) {
                    // Get a temporary URL for the file (valid for a limited time)
                    $item_photo_link = Storage::disk('local')->temporaryUrl($pathToFile, now()->addMinutes(5));
                    array_push($photos, $item_photo_link); // Adjust expiry time as needed
                }
            }
        }
        Log::info(json_encode($photos));
        return view($this->path.'/show',compact('data', 'photos'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:items,sku|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'photos' => 'nullable|array', // optional: allow photo uploads as an array
        ]);
    
        $item = new Item;
        $item->name = $validatedData['name'];
        $item->sku = $validatedData['sku'];
        $item->description = $request->description;
        $item->brand_id = $validatedData['brand_id'];
        $item->category_id = $validatedData['category_id'];
        $item->save();
        Log::info('before photo check');
        Log::info(json_encode($request->photos));
        Log::info('before photo check 2');
        // Handle Photo Upload (if any)
        if (isset($request->photos) && $request->hasFile('photos')) {
            // Log::info(json_encode($request->photos));
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                Log::info(json_encode($photo));
                $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/uploads/items', $photoName);
                $photos[] = $photoName;
            }
            $item->photos = json_encode($photos);
        } else {
            $item->photos = '[]'; // Empty JSON array if no photos uploaded
        }
    
        // Handle Data Details
        if(!empty($request->item_details)) {
            Log::info(json_encode($request->item_details));
            $itemDetail = new ItemDetail();
        foreach ($request->item_details as $dataDetail) {
            try{
            $itemDetail->item_id = $item->id;
            } catch(\Throwable $e) {
                continue;
            }
            try{
            $itemDetail->sku = $dataDetail['sku'];
            } catch(\Throwable $e) {
                continue;
            }
            try{
            $itemDetail->material_id = Material::where('name', $dataDetail['material'])->get('id') ?? null;
            } catch(\Throwable $e) {
                continue;
            }
            try{
            $itemDetail->spec_id = Spec::where('name', $dataDetail['spec'])->get('id') ?? null;
            } catch(\Throwable $e) {
                continue;
            }
            try{
            $itemDetail->class_id = Classes::where('name', $dataDetail['class'])->get('id') ?? null;
            } catch(\Throwable $e) {
                continue;
            }
            try{
            $itemDetail->conn_id = Conn::where('name', $dataDetail['conn'])->get('id') ?? null;
            } catch(\Throwable $e) {
                continue;
            }
            try{
            $itemDetail->size_id = Size::where('name', $dataDetail['size'])->get('id') ?? null;
            $itemDetail->save();
            } catch(\Throwable $e) {
                continue;
            }
            
        }
    }
    
        
    
        // Flash message or redirection after successful save
        $data = Item::orderBy('id', 'desc');
        $sku = "";
        $name = "";
        $category_id = 0;
        
        $brand = "";
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'brand'));
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
       
        if($request->photos) {
            $item->photos = $request->photos;
        }
        $item->save();
        $data = Item::orderBy('id', 'desc');
        $sku = "";
        $name = "";
        $category_id = 0;
       
        $brand = "";
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'brand'));
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