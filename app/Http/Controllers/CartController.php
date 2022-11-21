<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if ($cart == null) {
            $cart = [];
        }
        return view('cart.cart')->with('cart', $cart);
    }
}
