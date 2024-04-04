<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() {        
        return view('admin.frontend.about-us');
    }
    function store(Request $req) {

       

        AboutUs::where('id',1)->update([
            'body'=> $req->input('content'),
        ]);

        // Redirect atau response lainnya
    }
   
}