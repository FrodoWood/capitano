<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderAddress;
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

    public function placeOrder(Request $request)
    {
        $item = CartItem::where('user_id', '=', Auth::id())->firstOrFail();
        $dbcart = $item->data;
        if ($dbcart == null) {
            $dbcart = [];
        }

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'country' => 'required',
            'address' => 'required',
            'postcode' => 'required',
        ]);
        Order::create([
            'user_id' => Auth::id(),
            'order_items' => $dbcart,
            'price' =>  request('price'),
        ]);

        OrderAddress::create([
            'order_id' => request(),
            'firstname' => request('firstName'),
            'lastname' => request('lastName'),
            'email' => request('email'),
            'country' => request('country'),
            'address1' => request('address1'),
            'address2' => request('address2'),
            'county' => request('county'),
            'postcode' => request('postcode')
        ]);

        CartItem::updateOrCreate([
            'user_id' => Auth::id()
        ], [
            'data' => [],
        ]);
    }
}
