<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Services;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function aboutUsIndex()
    {
        return view('admin.frontend.about-us');
    }
    function aboutUsStore(Request $req)
    {

        // $header = $req->input('header');
        // Mengambil file yang diunggah
        $image1 = $req->file('image1');

        // Simpan gambar dengan nama tertentu
        if ($image1) {
            $imageName1 = 'storage/images/about-us/' . 'about-us-image1.' . $image1->getClientOriginalExtension();
            $imagePath1 = $image1->storeAs('public/images/about-us', 'about-us-image1.' . $image1->getClientOriginalExtension());
        } else {
            $imageName1 = AboutUs::where('id', 1)->first()->image1;
        }

        $image2 = $req->file('image2');
        if ($image2) {
            // Simpan gambar dengan nama tertentu
            $imageName2 = 'storage/images/about-us/' . 'about-us-image2.' . $image2->getClientOriginalExtension();
            $imagePath2 = $image2->storeAs('public/images/about-us', 'about-us-image2.' . $image2->getClientOriginalExtension());
        } else {
            $imageName2 = AboutUs::where('id', 1)->first()->image2;
        }

        // return $image1;
        // return $req->all();
        AboutUs::where('id', 1)->update([
            'header' => $req->input('header'),
            'body' => $req->input('content'),
            'image1' => $imageName1,
            'image2' => $imageName2,
            'header_homepage' => $req->input('header_homepage'),
            'body_homepage' => $req->input('body_homepage'),
        ]);

        // Redirect atau response lainnya
        return response()->json(['message' => 'Berhasil Menyimpan Data', 'type' => 'success']);
    }


    function servicesIndex()
    {
        $data  = Services::get();
        return view('admin.frontend.services', compact('data'));
    }

    function servicesStore(Request $req)
    {
        // return isset($req->image[0]);

        // $header = $req->input('header');
        // Mengambil file yang diunggah
        // Services::where('id', '!=', null)->delete();

        for ($i = 0; $i < count($req->header); $i++) {
            // Simpan gambar dengan nama tertentu
            if (isset($req->image[$i])) {
                $image = $req->file('image')[$i];

                $imageName = 'storage/images/services/' . 'services-image' . $i . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/services', 'services-image' . $i . '.' . $image->getClientOriginalExtension());
            } else {
                $imageName = Services::where('id', $req->input('id')[$i])->first()->image;
            }
            if ($req->input('dt')[$i] != 0) {
                Services::where('id',$req->id[$i])->update([
                    'header' => $req->input('header')[$i],
                    'body' => $req->input('body')[$i],
                    'image' => $imageName,
                ]);
            }else{
                Services::create([
                    'header' => $req->input('header')[$i],
                    'body' => $req->input('body')[$i],
                    'image' => $imageName,
                ]);
            }
            
        }

        return response()->json(['message' => 'Berhasil Menyimpan Data', 'type' => 'success']);
        // Redirect atau response lainnya
    }
}
