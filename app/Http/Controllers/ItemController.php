<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Material;
use App\Models\Spec;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Size;

use App\Exceptions\CustomArrayException;
use App\Models\ItemDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ItemExport;
use App\Exports\ItemDetailExport;
use App\Imports\ItemImport;
use App\Imports\ItemDetailImport;
use Validator;
use DB;

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
        $photo_html = "";
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
                ->addColumn('description', function($row){
                    return strip_tags($row->description);
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
                        $photo_html = "";
                    if(!empty($row->photos) && $row->photos != '[]') {
                        $item_photo_temp_list = json_decode($row->photos, true)[0];
                        
                        $pathToFile = 'public/uploads/items/'.$item_photo_temp_list; // Replace with your file path and disk
                        
                        // $pathToFile = 'public/uploads/items'.$data->photos; // Replace with your file path and disk
        
                        
                        if (Storage::disk('local')->exists($pathToFile)) {
                            // Get a temporary URL for the file (valid for a limited time)
                            // $photo = Storage::disk('local')->url($pathToFile);
                            $photo = Storage::disk('local')->url($pathToFile);
                        }
                        // $photo = asset($photo);
                        // $string=asset();
                        $photo_html = '<img src="'.$photo.'" width="100px"></img>';
                        // Log::info("photodfdfc ".asset($photo));
                    }
                        return $photo_html;

                        } catch(\Throwable $e) {
                            Log::info($e->getMessage().' '.json_encode($e->getTrace()));
                            return "";
                        }
                })
                ->rawColumns(['action', 'date', 'num_product', 'customer', 'branch', 'price', 'status', 'payment', 'shipping', 'payment_status', 'photos'])
                ->make(true);
            // Log::info('jdd '.json_encode($json_decode_data));
            return $json_decode_data;
        }
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'brand'));
    }
    function show(Request $request, $id) {
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
            'name' => 'required|string|unique:items,name|max:255',
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
        
        Log::info('before photo check');
        Log::info(json_encode($request->photos));
        Log::info('before photo check 2');
        // Handle Photo Upload (if any)
        if (isset($request->photos) && $request->hasFile('photos')) {
            Log::info('inside photo');
            Log::info(json_encode($request->photos));
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                
                $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
                Log::info('Photo name'.json_encode($photoName));
                $photo->storeAs('public/uploads/items', $photoName);
                $photos[] = $photoName;
            }
            $item->photos = json_encode($photos);
        } else {
            $item->photos = '[]'; // Empty JSON array if no photos uploaded
        }
        $item->save();
    
        // Handle Data Details
        if(!empty($request->item_details)) {
            $itemDetail = new ItemDetail();
        foreach ($request->item_details as $dataDetail) {
            Log::info('Data Details'.json_encode($dataDetail));

            try{
            $itemDetail->item_id = $item->id;
            } catch(\Throwable $e) {
            }
            try{
                Log::info('sku entered'.$dataDetail['sku']);
            $itemDetail->sku = $dataDetail['sku'];
            Log::info('sku check'.$itemDetail->sku);
            } catch(\Throwable $e) {
            }
            try{
                Log::info('material entered');
                $material_id = Material::where('name', $dataDetail['material'])->first()->id;
            $itemDetail->material_id = $material_id ?? null;
            Log::info('material check'.$itemDetail->material_id);
            } catch(\Throwable $e) {
            }
            try{
                Log::info('spec entered');
            $itemDetail->spec_id = Spec::where('name', $dataDetail['spec'])->first()->id ?? null;
            Log::info('spec check');
            } catch(\Throwable $e) {
            }
            try{
            $itemDetail->class_id = Classes::where('name', $dataDetail['class'])->first()->id ?? null;
            } catch(\Throwable $e) {
            }
            try{
            $itemDetail->conn_id = Conn::where('name', $dataDetail['conn'])->first()->id ?? null;
            } catch(\Throwable $e) {
            }
            try{
                Log::info('check size');
            $itemDetail->size_id = Size::where('name', $dataDetail['size'])->first()->id ?? null;
            } catch(\Throwable $e) {
            }

            try{
            Log::info('Item Detail Pre Execution'.json_encode($itemDetail));
            $itemDetail->price =  (int) $dataDetail['price'];
            $itemDetail->save();
            Log::info('Item Detail Save Executed'.json_encode($itemDetail));
            } catch(\Throwable $e) {
                Log::info($e->getMessage());
            }
            
        }
    }
    
        
    
        // Flash message or redirection after successful save
        $data = Item::orderBy('id', 'desc')->get();
        $sku = "";
        $name = "";
        $category_id = 0;
        
        $brand = "";
        Log::info('before controller');
        
        return view($this->path.'/index',compact('data', 'sku', 'name', 'category_id', 'brand'));
    }
    function edit(Request $request, $id) {
        Log::info($id);
        $data = Item::findOrFail($id);
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
        return view($this->path.'/edit',compact('data', 'photos'));
    }
    function update(Request $request, $id) {
        $item = Item::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'photos' => 'nullable|array', // optional: allow photo uploads as an array
        ]);
        $item->name = $validatedData['name'];
        $item->sku = $validatedData['sku'];
        $item->description = $request->description;
        $item->brand_id = $validatedData['brand_id'];
        $item->category_id = $validatedData['category_id'];
       
        if($request->photos) {
            $item->photos = $request->photos;
        }
        $item->save();
        $itemDetail = new ItemDetail();
        $list_sku = [];
        if(!empty($request->item_details)) {
        foreach ($request->item_details as $dataDetail) {
            Log::info('Data Details'.json_encode($dataDetail));
           
            try{
            $itemDetail->item_id = $item->id;
            } catch(\Throwable $e) {
            }
            try{
                Log::info('sku entered'.$dataDetail['sku']);
                $itemDetailCheck = ItemDetail::where('sku', $dataDetail['sku'])->first();
                if(!empty($itemDetailCheck)) {
                    $itemDetail = $itemDetailCheck;
                }
            $itemDetail->sku = $dataDetail['sku'];
            Log::info('sku check'.$itemDetail->sku);
            } catch(\Throwable $e) {
            }
            try{
                Log::info('material entered');
                $material_id = Material::where('name', $dataDetail['material'])->first()->id;
            $itemDetail->material_id = $material_id ?? null;
            Log::info('material check'.$itemDetail->material_id);
            } catch(\Throwable $e) {
            }
            try{
                Log::info('spec entered');
            $itemDetail->spec_id = Spec::where('name', $dataDetail['spec'])->first()->id ?? null;
            Log::info('spec check');
            } catch(\Throwable $e) {
            }
            try{
            $itemDetail->class_id = Classes::where('name', $dataDetail['class'])->first()->id ?? null;
            } catch(\Throwable $e) {
            }
            try{
            $itemDetail->conn_id = Conn::where('name', $dataDetail['conn'])->first()->id ?? null;
            } catch(\Throwable $e) {
            }
            try{
                Log::info('check size');
            $itemDetail->size_id = Size::where('name', $dataDetail['size'])->first()->id ?? null;
            } catch(\Throwable $e) {
            }

            try{
            Log::info('Item Detail Pre Execution'.json_encode($itemDetail));
            $itemDetail->price =  (int) $dataDetail['price'];
            $itemDetail->save();
            array_push('list_sku', $dataDetail['sku']);
            Log::info('Item Detail Save Executed'.json_encode($itemDetail));
            } catch(\Throwable $e) {
                Log::info($e->getMessage());
            }
        }
    }
        $itemDetailCheck = ItemDetail::where('item_id', $id)->get();
        foreach($itemDetailCheck as $idc) {

            if(!in_array($idc->sku, $list_sku)) {
                Log::info('test');
                ItemDetail::destroy($idc->id);
            }
        }
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

    function export(Request $request) {
        $filePath = 'temp/items.xlsx';
        Excel::store(new ItemExport, $filePath);
        return Storage::download($filePath);
    }
    function export_item_detail(Request $request) {
        $filePath = 'temp/item_details.xlsx';
        Excel::store(new ItemDetailExport, $filePath);
        return Storage::download($filePath);
    }
    function import(Request $request) {

        $validator = Validator::make(
            $request->all(),
            rules: [
                'file' => ['required', 'mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']
            ],
            messages:[
                'file.mimetypes' => 'File type must be .xlsx'
            ]
        );

        $validator->validate();


        $file = $request->file('file');

        DB::beginTransaction();
        try {
            Log::info('import item 1');
            Excel::import(new ItemImport(), $file);
            Log::info('import item 2');
        } catch (CustomArrayException $errorMsg) {
            Log::info('import item 3');
            Log::info('Error Msg'.$errorMsg);
            $errorLog = '';
            foreach ($errorMsg->getData() as $key => $errors) {
                $errorLog = $errorLog . "Row {$key}:\n";
                foreach ($errors as $error) {
                    $errorLog = $errorLog . "- " . $error . "\n";
                }
            }
            DB::commit();
            return back()->with(['errorValidationImportItem' => true, 'errorMsg' => $errorLog]);
        }

        DB::commit();

        return back()->with(['successMsg' => 'Item Sukses Di Impor']);
    }
    function import_item_detail(Request $request) {
        Log::info('import item test in');
        $validator = Validator::make(
            $request->all(),
            rules: [
                'file' => ['required', 'mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']
            ],
            messages:[
                'file.mimetypes' => 'File type must be .xlsx'
            ]
        );

        $validator->validate();

        $file = $request->file('file');

        DB::beginTransaction();
        try {
            Log::info('import item test');
            Excel::import(new ItemDetailImport(), $file);
        } catch (CustomArrayException $errorMsg) {
            Log::info('import item error');
            $errorLog = '';
            foreach ($errorMsg->getData() as $key => $errors) {
                $errorLog = $errorLog . "Row {$key}:\n";
                foreach ($errors as $error) {
                    $errorLog = $errorLog . "- " . $error . "\n";
                }
            }
            Log::info($errorLog);
            DB::commit();
            return back()->with(['errorValidationImportItem' => true, 'errorMsg' => $errorLog]);
        }
        
        DB::commit();

        return back()->with(['successMsg' => 'Item Detail Sukses Di Impor']);
    }


}