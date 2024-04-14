<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Artisan;

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
        $this->overWriteEnvFile('APP_URL', $request->app_url);
        $this->overWriteEnvFile('APP_ADDRESS', $request->address);
        $this->overWriteEnvFile('MAIL_FROM_ADDRESS', $request->email);
        $this->overWriteEnvFile('APP_PHONE', $request->phone);
        Log::info('settings check');
        Log::info(json_encode($request->logo));
        Log::info($request->logo);
        Log::info($request->hasFile($request->logo));
        if(isset($request->logo)) {
            $logo = $request->logo;
            $logo->storeAs('public/front-end/images', 'logo-light.png');
            Log::info($logo->getPathname());
        }
        // Artisan::call('cache:clear');
        $data = [];
        return redirect()->back();
    }

    public function overWriteEnvFile($type, $val)
    {
        
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }
    }

    function edit(Request $request) {
        
        $data = [];
        return view($this->path.'/edit',compact('data'));
    }
    function update(Request $request, $id) {
       
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