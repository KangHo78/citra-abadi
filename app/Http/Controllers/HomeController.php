<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Item;
use App\Models\ShareProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private string $path;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    function index() {
        $category = Category::get();
        $item = Item::get();
        return view('welcome',compact('category','item'));
    }
    function show() {
        $data = [];
        return view($this->path.'/show',compact('data'));
    }
    function create() {
        $data = [];
        return view($this->path.'/create',compact('data'));
    }
    function store() {
    
    }
    function edit() {
        $data = [];
        return view($this->path.'/edit',compact('data'));
    }
    function update() {
    
    }
    function print() {
        $data = [];
        return view($this->path.'/print',compact('data'));
    }
    function destroy() {
    
    }

    function dataMaterial(Request $req) {
        $category = Category::where('name',$req->q)->get();
        return response()->json($category);
    }

    function profile() {
        $enquiry = Enquiry::get();
        return view('user.profile',compact('enquiry'));
    }
    function updateProfile($id,Request $req) {


        // Simpan gambar dengan nama tertentu
        if (isset($req->npwp_photo)) {
            $imageNpwp = $req->file('npwp_photo');

            $npwpPhoto = 'storage/images/user/npwp/' .Auth::user()->id.'npwp.' . $imageNpwp->getClientOriginalExtension();
            $imageNpwp->storeAs('public/images/user/npwp', Auth::user()->id.'npwp.' . $imageNpwp->getClientOriginalExtension());
        } else {
            $npwpPhoto = User::where('id', 1)->first()->npwp_photo;
        }


        if (isset($req->profile_photo_path)) {
            $imageProfile = $req->file('profile_photo_path');

            $profilePhoto = 'storage/images/user/profile/' .Auth::user()->id. 'profile.' . $imageProfile->getClientOriginalExtension();
            $imageProfile->storeAs('public/images/user/profile', Auth::user()->id.'profile.' . $imageProfile->getClientOriginalExtension());
        } else {
            $profilePhoto = User::where('id', 1)->first()->profile_photo_path;
        }

        User::where('id',Auth::user()->id)->update([
            'name'=>$req->name,
            'email'=>$req->email_address,
            'phone'=>$req->phone,
            'position'=>$req->position,
            'company_name'=>$req->company_name,
            'npwp'=>$req->npwp,
            'npwp_photo'=>$npwpPhoto,
            'profile_photo_path'=>$profilePhoto,
            'address'=>$req->address,
            'address_2'=>$req->address_2,
        ]);
        return redirect()->back();
    }
    function shareProduct(Request $req) {
        ShareProduct::create(['item_id'=>$req->item_id,'customer_id'=>Auth::user()->id]);
        return response()->json(['message' => 'Berhasil Mencopy Link','id'=>$req->item_id,'type'=>'success']);
    }
}