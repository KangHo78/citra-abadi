<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdjustmentController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.inventory.adjustment';
    }

    function index() {
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function show() {
        $data = [];
        return view($this->path.'/show',compact('data'));
    }
    function create($opname = false) {
        if(!$opname) {
        $data = [];
        return view($this->path.'/create',compact('data'));
        } else {
            $data = [];
            return view($this->path.'/stok_opname',compact('data'));
        }
    }
    function store() {
    
    }
    function edit() {
        $data = [];
        return view($this->path.'/edit',compact('data'));
    }
    function update() {
    
    }
    function print($opname = false) {
        if(!$opname) {
            $data = [];
            return view($this->path.'/print',compact('data'));
        } else {
            $data = [];
            return view($this->path.'/stok_opname_print',compact('data'));
        }
    }
    function stok_opname() {
       return self::create(true);
    }
    function stok_opname_print() {
        return self::print(true);
     }
    function destroy() {
    
    }
}