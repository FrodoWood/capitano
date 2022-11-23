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

        if (Auth::check()) {
            CartItem::updateOrCreate([
                'user_id' => Auth::id()
            ], [
                'data' => $cart,
            ]);
        }

        return view('cart.cart')->with('cart', $cart);
    }

    public function removeFromCart(Request $request)
    {
        //session()->put('cart', $request->post('cart'));
        //session()->remove('cart', $request->post('index'));

        $cart = session()->get('cart');
        if ($cart == null) {
            $cart = [];
        }

        $index = $request->post('index');
        array_splice($cart, $index, 1);
        session()->put('cart', $cart);

        if (Auth::check()) {
            CartItem::updateOrCreate([
                'user_id' => Auth::id()
            ], [
                'data' => $cart,
            ]);
        }
    }
}
