<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if ($cart == null) {
            $cart = [];
        }

        if(Auth::check()){
            $input =[
                'user_id'=>Auth::id(),
                'data'=>$cart,
            ];
            $item = CartItem::create($input);
        }
        return view('cart.cart')->with('cart', $cart);
    }
}
