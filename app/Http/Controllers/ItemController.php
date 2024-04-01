<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        if($request->sku) {
            $data = $data->where('sku', 'like', self::like($request->sku));
        }
        if($request->name) {
            $data = $data->where('name', 'like', self::like($request->name));
        }
        // if() {
        //     $data = $data->where('code', 'like', self::like($request->code));
        // }
        if($request->category_id) {
            $data = $data->whereHas('category', function($query)
            {
                $query->where('id', $request->category_id);

                });
        }
        if($request->subcategory_id_1) {
            $data = $data->whereHas('subcategory_1', function($query)
            {
                $query->where('id', $request->subcategory_id_1);

                });
        }
        if($request->subcategory_id_2) {
            $data = $data->whereHas('subcategory_2', function($query)
            {
                $query->where('id', $request->subcategory_id_2);

                });
        }
        if($request->subcategory_id_3) {
            $data = $data->whereHas('subcategory_3', function($query)
            {
                $query->where('id', $request->subcategory_id_3);

                });
        }
        if($request->subcategory_id_4) {
            $data = $data->whereHas('subcategory_4', function($query)
            {
                $query->where('id', $request->subcategory_id_4);

                });
        }
        if($request->subcategory_id_5) {
            $data = $data->whereHas('subcategory_5', function($query)
            {
                $query->where('id', $request->subcategory_id_5);

                });
        }
        if($request->subcategory_id_6) {
            $data = $data->whereHas('subcategory_6', function($query)
            {
                $query->where('id', $request->subcategory_id_6);

                });
        }
        if($request->brand) {
            $data = $data->whereHas('brand', function($query)
            {
                $query->where('id', $request->brand);

                });
        }

        
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = Item::where('id', $request->id);
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
        $item->subcategory_id_1 = $request->subcategory_id_1;
        $item->subcategory_id_2 = $request->subcategory_id_2;
        $item->subcategory_id_3 = $request->subcategory_id_3;
        $item->subcategory_id_4 = $request->subcategory_id_4;
        $item->subcategory_id_5 = $request->subcategory_id_5;
        $item->subcategory_id_6 = $request->subcategory_id_6;
        if($request->photos) {
            $item->photos = $request->photos;
        }
        $item->save();
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request) {
        $data = Item::where('id', $request->id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $item = Item::where('id', $request->id);
        $item->name = $request->name;
        $item->sku = $request->sku;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->category_id = $request->category_id;
        $item->subcategory_id_1 = $request->subcategory_id_1;
        $item->subcategory_id_2 = $request->subcategory_id_2;
        $item->subcategory_id_3 = $request->subcategory_id_3;
        $item->subcategory_id_4 = $request->subcategory_id_4;
        $item->subcategory_id_5 = $request->subcategory_id_5;
        $item->subcategory_id_6 = $request->subcategory_id_6;
        if($request->photos) {
            $item->photos = $request->photos;
        }
        $item->save();
        $data = [];
        return view($this->path.'/index',compact('data'));
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