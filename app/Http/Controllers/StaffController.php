<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Hash;

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
        $data = User::orderBy('id', 'desc')->where('code', null)->get();	
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = User::where('id', $request->id)->first();
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) { // TODO:
        $validatedData = $request->validate([ // TODO: here
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if($validatedData['password'] == $validatedData['confirm_password']) {
        $user->password = Hash::make($validatedData['password']);
        } else {
            $error = 'Password Tidak Sama';
            $data = [];
            return view($this->path.'/create',compact('data', 'error'));
        }
        

        $user->save();
        $data = User::orderBy('id', 'desc')->where('code', null)->get();;
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request, $id) { // TODO:
        Log::info($id);
        $data = User::findOrFail($id);
        Log::info(json_encode($data));
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request, $id) {
        $validatedData = $request->validate([ // TODO: here
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required',
            'confirm_password' => 'required'
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
            return view($this->path.'/edit',compact('data', 'error'));
        }
    }
        $user->save();
        $data = User::orderBy('id', 'desc')->where('code', null)->get();;
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