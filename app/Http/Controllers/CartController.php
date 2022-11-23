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
        //session()->put('cart', $request->post('cart'));
        //session()->remove('cart', $request->post('index'));

        // $cart = session()->get('cart');
        $cart = $request->post('cart');
        if ($cart == null) {
            $cart = [];
        }

        $index = $request->post('index');
        //array_splice($cart, $index, 1);
        //session()->put('cart', $cart);

        if (Auth::check()) {
            CartItem::updateOrCreate([
                'user_id' => Auth::id()
            ], [
                'data' => $cart,
            ]);
        }
    }
}
