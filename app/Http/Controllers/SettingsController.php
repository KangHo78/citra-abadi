<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.settings.general.';
    }
    function like($text) {
        return '%'.$text.'%';
    }

    function index(Request $request) {
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function show(Request $request) {
        $data = [];
        return view($this->path.'/show',compact('data'));
    }
    function create(Request $request) {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store(Request $request) {
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function edit(Request $request) {
        $data = [];
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request) {
        $data = [];
        return view($this->path.'/index',compact('data'));
    }
    function print(Request $request) {
        $data = [];
        return view($this->path.'/print',compact('data'));
    }
    // function destroy(Request $request) {
    //     $data = [];
    //     return view($this->path.'/index',compact('data'));
    // }
}