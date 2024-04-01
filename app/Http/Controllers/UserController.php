<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
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
        $data = User::orderBy('id', 'desc')->where(''); // TODO:
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = User::where('id', $request->id);
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
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request) {
        $data = User::where('id', $request->id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $user = User::find($request->id);
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
        $data = [];
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