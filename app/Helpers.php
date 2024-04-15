<?php

use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

if (!function_exists('checkCarts')) {
    function checkCarts()
    {

        if (Auth::check()) {
            $totalCarts = Cart::with('item','item_detail')->where('user_id', Auth::user()->id)->count();
            $carts = Cart::with('item','item_detail')->where('user_id', Auth::user()->id)->get();
        }else{
            $totalCarts = 0;
            $carts = [];
        }

        return ['totalCart' => $totalCarts, 'carts' => $carts];
    }
}

if (!function_exists('aboutUs')) {
    function aboutUs()
    {
        return AboutUs::first();
    }
}

if (!function_exists('servicesFront')) {
    function servicesFront()
    {
        return Services::get();
    }
}
