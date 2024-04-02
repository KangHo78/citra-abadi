<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller

{

    use HasRoles;
    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.settings.customer.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = User::where('code', '!=', null)->where('code', '!=', '0'); 
        $code = "";
        $name = "";
        if($request->code) {
            $data = $data->where('code', 'like', '%'.$request->code.'%');
        }
        if($request->name) {
            $data = $data->where('name', 'like', '%'.$request->name.'%');
        }
        $data = $data->orderBy('id', 'desc')->get();
        return view($this->path.'/index',compact('data', 'code', 'name'))->render();
    }
    // function search(Request $request) {
    //     $data = User::orderBy('id', 'desc')->where('code', 'like', '%'.$request->keyword.'%')->orWhere('name', 'like', '%'.$request->keyword.'%')->orWhere('company_name', 'like', '%'.$request->keyword.'%')->get(); // TODO:
    //     return view($this->path.'/index',compact('data'));
    // }
    function show(Request $request, $id) {
        try{
        $data = User::findOrFail($id);
        } catch(\Throwable $e) {
            $data = User::where('code', '!=', null)->where('code', '!=', '0')->orderBy('id', 'desc')->get();
           return self::index($request);
        } 
        // Log::info(json_encode($data->company_name));

        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = ['code' => 'CUS-'.self::incrementalHash(), 'customer' => User::where('code', 'like', '%CUS%')->latest()->take(5)->get()];
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
        Log::info('store');
        $user = new User;
        $user->name = $request->name;
        $requestCode = $request->code;
        $enquiry_check = User::where('code', $requestCode)->get();
        if(!empty($enquiry_check)) {
            $requestCode = 'CUS-'.self::incrementalHash();
        }
        $user->code = $requestCode;
        $user->email = $request->email;
        $user->password = "";
        $user->position = $request->position;
        $user->company_name = $request->company_name;
        $user->npwp = $request->npwp;
        if($request->file('npwp_photo')) {
            $imageNPWP = $req->file('npwp_photo');
            $imageNPWPName = 'NPWP_' . $user->id . '_' . time() . '.' . $imageNPWP->getClientOriginalExtension();
            $imageNPWP->move(public_path('storage/images'), $imageNPWPName);
            $user->npwp_photo = $imageNPWPName;
        }
        $user->address = $request->address;
        $user->address_2 = $request->address_2;
        $user->phone = $request->phone;
        $user->save();
        Log::info('check');
        $request = new Request;
        $data = User::where('code', '!=', null)->where('code', '!=', '0')->orderBy('id', 'desc'->get());
        return self::index($request);
    }
    function edit(Request $request, $id) {
        $data = User::findOrFail($id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->code = $request->code;
        $user->email = $request->email;
        $user->position = $request->position;
        $user->company_name = $request->company_name;
        $user->npwp = $request->npwp;
        if($request->file('npwp_photo')) {
            $imageNPWP = $req->file('npwp_photo');
                $imageNPWPName = 'NPWP_' . $user->id . '_' . time() . '.' . $imageNPWP->getClientOriginalExtension();
                $imageNPWP->move(public_path('storage/images'), $imageNPWPName);
            $user->npwp_photo = $imageNPWPName;
        }
        $user->address = $request->address;
        $user->address_2 = $request->address_2;
        $user->phone = $request->phone;
        $user->save();
        $data = User::where('code', '!=', null)->where('code', '!=', '0')->orderBy('id', 'desc')->get();
        return view($this->path.'/index',compact('data'));
    }
    function print(Request $request) {
        $data = [];
        return view($this->path.'/print',compact('data'));
    }
    function destroy(Request $request) {
        User::find($request->id)->delete();
        $data = User::all();
        return view($this->path.'/index',compact('data'));
    }
}