<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

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
        $data = Role::orderBy('id', 'asc')->whereNot('id', 1);	
        if($request->name) {
            $data = $data->where('name', '>=', $request->name);
        }
        $data = $data->get();
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = Role::where('id', $request->id)->whereNot('id', 1);
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $role = new Role;
        if($request->name) {
            $role->name = $request->name;
        }  else {
            $error = 'Nama Hak Akses Kosong';
            $data = [];
            return view($this->path.'/create',compact('data', 'error'));
        }
        $role->guard_name = 'web';
        $role->save();
        $permissions = $request->except('name');

      
       
        foreach($permissions as $permissionKey => $permissionRow) {
            $permissionCheck = Permission::where('name', $permissionKey)->first();
            if(!empty($permissionCheck)) {
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $permissionCheck->id,
                    'role_id' => $role->id
                ]);
            }
        }
        $data = Role::orderBy('id', 'asc')->whereNot('id', 1)->get();
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request, $id) {
        $data = Role::where('id', $id)->first();
        $role_has_permissions = DB::table('role_has_permissions')->where('role_id', $id)->get()->toArray();
        $permissions = [];
        foreach($role_has_permissions as $role_has_permission) {
            array_push($permissions, Permission::where('id', $role_has_permission->permission_id)->first()->name);
        }
        return view($this->path.'/edit',compact('data', 'permissions'));
    }
    function update(Request $request, $id) {
        $role = Role::where('id', $id)->first();
        if($request->name) {
            $role->name = $request->name;
        } else {
            $error = 'Nama Hak Akses Kosong';
            $data = Role::where('id', $id)->first();
            $role_has_permissions = DB::table('role_has_permissions')->where('role_id', $id)->get()->toArray();
            $permissions = [];
            foreach($role_has_permissions as $role_has_permission) {
                array_push($permissions, Permission::where('id', $role_has_permission->permission_id)->first()->name);
            }
            return view($this->path.'/edit',compact('data', 'permissions', 'error'));
        }
        $role->guard_name = 'web';
        $role->save();
        $permissions = $request->except('name');
        foreach($permissions as $permissionKey => $permissionRow) {
            $permissionCheck = Permission::where('name', $permissionKey)->first();
            if(!empty($permissionCheck)) {
                $checked = $request->has($permissionCheck->name);
                // Log::info('Name '.$permissionCheck->name);
                // Log::info('Checked '.$checked);
                $role_permission_exists = DB::table('role_has_permissions')->where('permission_id', $permissionCheck->id)->where('role_id', $role->id)->first();
                if($checked && empty($role_permission_exists)) {
                    DB::table('role_has_permissions')->insert([
                        'permission_id' => $permissionCheck->id,
                        'role_id' => $role->id
                    ]);
                } 
                
            }
        }
        $permission_list = Permission::all();
        foreach($permission_list as $permission) {

            $checked = $request->has($permission->name);
            $role_permission_exists = DB::table('role_has_permissions')->where('permission_id', $permission->id)->where('role_id', $role->id)->first();
            if(!$checked && !empty($role_permission_exists)) {
                
                DB::table('role_has_permissions')->where('permission_id', $permission->id)->where('role_id', $role->id)->delete();
            }
        }
        $data = Role::orderBy('id', 'asc')->whereNot('id', 1)->get();	
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