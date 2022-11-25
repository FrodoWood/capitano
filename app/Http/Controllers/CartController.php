<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $item = CartItem::where('user_id', '=', Auth::id())->firstOrFail();
            $dbcart = $item->data;
            $cart = $dbcart;
        } else {
            $cart = session()->get('cart');
        }

        if ($cart == null) {
            $cart = [];
        }

        // Uploading cart to database
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
        $cart = $request->post('cart');
        if ($cart == null) {
            $cart = [];
        }
        if (Auth::check()) {
            CartItem::updateOrCreate([
                'user_id' => Auth::id()
            ], [
                'data' => $cart,
            ]);
        } else {
            session()->put('cart', $cart);
        }
    }

    public function checkout()
    {
        $item = CartItem::where('user_id', '=', Auth::id())->firstOrFail();
        $dbcart = $item->data;
        if ($dbcart == null) {
            $dbcart = [];
        }
        return view('cart.checkout')->with('cartItems', $dbcart);
    }
}
