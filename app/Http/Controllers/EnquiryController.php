<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
Use App\Models\User;
use App\Models\EnquiryDetail;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.transaction.sales.';
    }

    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Enquiry::orderBy('id', 'desc');	
        if($request->date_start) {
            $data = $data->where('created_at', '>=', $request->date_start);
        }
        if($request->date_end) {
            $data = $data->where('created_at', '<=', $request->date_start);
        }
        if($request->code) {
            $data = $data->where('code', 'like', self::like($request->code));
        }
        if($request->customer) {
            $data = $data->whereHas('customer', function($query)
            {
                $query->where('name', 'like', self::like($request->customer));

            });
        }
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request, $id) {
        $data = Enquiry::where('id', $id);
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = ['code' => 'ENQ-'.self::incrementalHash(), 'customer' => User::where('code', 'like', '%CUS%')->latest()->take(5)->get()];
        return view($this->path.'/create',compact('data'));
    }

    function incrementalHash($len = 6){
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $base = strlen($charset);
        $result = '';
      
        $now = explode(' ', microtime())[1];
        while ($now >= $base){
          $i = $now % $base;
          $result = $charset[$i] . $result;
          $now /= $base;
        }
        return substr($result, -5);
      }

    function store(Request $request) {
        $enquiry = new Enquiry;
        $requestCode = $request->code;
        $enquiry_check = Enquiry::where('code', $requestCode)->get();
        if(!empty($enquiry_check)) {
            $requestCode = 'ENQ-'.self::incrementalHash();
        }
        $enquiry->code = $requestCode;
        $enquiry->date = $request->date;
        $enquiry->desc = $request->desc;
        $enquiry->status = $request->status;
        $enquiry->customer_id = $request->customer_id;
        $enquiry->discount = $request->discount;
        $enquiry->discount_type = $request->discount_type;
        $enquiry->grand_total = $request->grand_total;
        $enquiry->save();
        if($request->enquiry_details) {
            $eds = $request->enquiry_details;
            foreach($eds as $ed) {
                $enquiry_details = new EnquiryDetail;
                $enquiry_details->id = $enquiry->id;
                $enquiry_details->item_id = $ed->item_id;
                $enquiry_details->item_price = $ed->item_price;
                $enquiry_details->item_quantity = $ed->item_quantity;
                $enquiry_details->save();
            }
        }

        $data = Enquiry::all();
        return view($this->path.'/index', compact('data'));
    }
    function edit(Request $request) {
        $data = Enquiry::where('id', $request->id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $enquiry = Enquiry::where('id', $request->id)->get();
        $enquiry->code = $request->code;
        $enquiry->date = $request->date;
        $enquiry->desc = $request->desc;
        $enquiry->status = $request->status;
        $enquiry->customer_id = $request->customer_id;
        $enquiry->discount = $request->discount;
        $enquiry->discount_type = $request->discount_type;
        $enquiry->grand_total = $request->grand_total;
        $enquiry->save();
        if($request->enquiry_details) {
            $eds = $request->enquiry_details;
            foreach($eds as $ed) {
                $enquiry_details = EnquiryDetail::where('id', $enquiry->id)->where('item_id', $ed->item_id)->get();
                if(empty($enquiry_details)) {
                    $enquiry_details = new EnquiryDetail;
                }
                $enquiry_details->id = $enquiry->id;
                $enquiry_details->item_id = $ed->item_id;
                $enquiry_details->item_price = $ed->item_price;
                $enquiry_details->item_quantity = $ed->item_quantity;
                $enquiry_details->save();
            }
        }
        $data = Enquiry::all();
        return view($this->path.'/index',compact('data'));
    }
    function print(Request $request) {
        $data = Enquiry::where('id', $request->id);
        return view($this->path.'/print',compact('data'));
    }
    function email(Request $request) {//TODO:
        $data = Enquiry::where('id', $request->id);
        return view($this->path.'/print',compact('data'));
    }
    function destroy(Request $request) {
        Enquiry::find($request->id)->delete();
        $data = Enquiry::all();
        return view($this->path.'/show',compact('data'));
    }
}