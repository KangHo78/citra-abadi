<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Hash;
use DB;
use Str;

class StaffController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.settings.staff.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) { // TODO:
        $data = User::orderBy('id', 'desc')->where('code', null)->whereNot('id', 1)->get();	
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = User::where('id', $request->id)->first();
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        $roles = Role::whereNot('id', 1)->get();
        return view($this->path.'/create',compact('data', 'roles'));
    }
    function store(Request $request) { // TODO:
        $validatedData = $request->validate([ // TODO: here
            'name' => 'required|string|unique:users,name|max:255',
            'email' => 'required|string|unique:users,email|max:255',
            'password' => 'required',
            'confirm_password' => 'required',
            'role_id' => 'required'
        ]);
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if($validatedData['password'] == $validatedData['confirm_password']) {
        $user->password = Hash::make($validatedData['password']);
        $user->remember_token = Str::random(10);
        } else {
            $error = 'Password Tidak Sama';
            $data = [];
            $roles = Role::whereNot('id', 1)->get();
            return view($this->path.'/create',compact('data', 'error', 'roles'));
        }
        

        $user->save();

        DB::table('model_has_roles')->insert([
            'role_id' => $validatedData['role_id'],
            'model_type' => 'App\Models\User',
            'model_id' => $user->id
        ]);
        
        $data = User::orderBy('id', 'desc')->where('code', null)->whereNot('id', 1)->get();	
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request, $id) { // TODO:
        Log::info($id);
        $data = User::findOrFail($id);
        Log::info(json_encode($data));
        $roles = Role::whereNot('id', 1)->get();
        $current_role_id = DB::table('model_has_roles')->where('model_id', $data->id)->first()->role_id;
        return view($this->path.'/edit',compact('data', 'roles', 'current_role_id'));
    }
    function update(Request $request, $id) {
        $validatedData = $request->validate([ // TODO: here
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'role_id' => 'required',
            'password' => 'nullable',
            'confirm_password' => 'nullable'
        ]);
        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if(!empty($validatedData['password']) && !empty($validatedData['confirm_password'])) {
         if($validatedData['password'] == $validatedData['confirm_password']) {
        $user->password = Hash::make($validatedData['password']);
        }  else {
            $error = 'Password Tidak Sama';
            $data = User::findOrFail($id)->first();
            $roles = Role::whereNot('id', 1)->get();
            return view($this->path.'/edit',compact('data', 'error', 'roles'));
        }
    }
        $user->save();
        try{
            DB::table('model_has_roles')->update([
                'role_id' => $validatedData['role_id'],
                'model_type' => 'App\Models\User',
                'model_id' => $user->id
            ]);
        } catch(\Throwable $e) {
            
        }
        $data = User::orderBy('id', 'desc')->where('code', null)->whereNot('id', 1)->get();;
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