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
        if($request->code) {
            $data = $data->where('code', 'like', '%'.$request->code.'%');
        }
        if($request->name) {
            $data = $data->where('name', 'like', '%'.$request->name.'%');
        }
        $data = $data->orderBy('id', 'desc')->get();
        return view($this->path.'/index',compact('data'))->render();
    }
    // function search(Request $request) {
    //     $data = User::orderBy('id', 'desc')->where('code', 'like', '%'.$request->keyword.'%')->orWhere('name', 'like', '%'.$request->keyword.'%')->orWhere('company_name', 'like', '%'.$request->keyword.'%')->get(); // TODO:
    //     return view($this->path.'/index',compact('data'));
    // }
    function show(Request $request) {
        $data = User::where('id', $request->id)->get();
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->code = $request->code;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->position = $request->position;
        $user->company_name = $request->company_name;
        $user->npwp = $request->npwp;
        if($request->npwp_photo) {
            $user->npwp_photo = $request->npwp_photo;
        }
        $user->address = $request->address;
        $user->address_2 = $request->address_2;
        $user->phone = $request->phone;
        $user->save();
        $data = User::where('code', '!=', null)->where('code', '!=', '0')->orderBy('id', 'desc');
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request, $id) {
        $data = User::findOrFail('id', $id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->code = $request->code;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->position = $request->position;
        $user->company_name = $request->company_name;
        $user->npwp = $request->npwp;
        if($request->npwp_photo) {
            $user->npwp_photo = $request->npwp_photo;
        }
        $user->address = $request->address;
        $user->address_2 = $request->address_2;
        $user->phone = $request->phone;
        $user->save();
        $data = User::where('code', '!=', null)->where('code', '!=', '0')->orderBy('id', 'desc');
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