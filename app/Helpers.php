<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

if (!function_exists('checkCarts')) {
    function checkCarts()
    {

        $totalCarts = Cart::where('user_id', Auth::user()->id)->count();
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        return ['totalCart' => $totalCarts, 'carts' => $carts];
    }
}
