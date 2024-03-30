<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.settings.role.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = Role::orderBy('id', 'asc');	
        if($request->name) {
            $data = $data->where('name', '>=', $request->name);
        }
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = Role::where('id', $request->id);
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        if($request->permission) {
            $permissions = $request->permission;
            foreach($permissions as $permissionRow) {
                $permissionCheck = Permission::where('id', $permissionRow->id)->get();
                if(!empty($permissionCheck) && $permissionRow->bool) {
                    $permission = new Permission;
                    $permission->permission_id = $permissionRow;
                    $permission->role_id = $role->id;
                    $permission->save();
                }
            }
        }
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request) {
        $data = Role::where('id', $request->id);
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $role = Role::where('id', $request->id);
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        if($request->permission) {
            $permissionCheck = Permission::where('id', $permissionRow->id)->get();
            if(!empty(permissionCheck) && $permissionRow->bool) {
                $permission = new Permission;
                $permission->permission_id = $permissionRow;
                $permission->role_id = $role->id;
                $permission->save();
            } else if(empty($permissionCheck) && !$permissionRow->bool){
                Permission::find($permissionRow->id)->delete();
            }
        }
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    // function print(Request $request) {
    //     $data = [];
    //     return view($this->path.'/print',compact('data'));
    // }
    // function destroy(Request $request) {
    //     Role::find($request->id)->delete();
    //     $data = Enquiry::all();
    //     return view($this->path.'/index',compact('data'));
    // }
}