<?php

use App\Models\AboutUs;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

if (!function_exists('checkCarts')) {
    function checkCarts()
    {

        if (Auth::check()) {
            $totalCarts = Cart::where('user_id', Auth::user()->id)->count();
            $carts = Cart::where('user_id', Auth::user()->id)->get();
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
