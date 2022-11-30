<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if (Auth::check()) {
            $item = CartItem::where('user_id', '=', Auth::id())->first();
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

        return view('cart.cart')->with('cart', $cart)->with('products', $products);
    }

    public function updateCart(Request $request)
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
        //Combine session cart and db cart and update database
        $cart = [];
        $item = CartItem::where('user_id', '=', Auth::id())->first();
        $sessionCart = session()->get('cart');
        if ($cart == null) {
            $cart = [];
        }
        if ($sessionCart == null) {
            $sessionCart = [];
        }
        if ($item != null) {
            $dbcart = $item->data;
            $cart = $dbcart;
        }
        $cart = array_merge($cart, $sessionCart);
        session()->forget('cart');
        CartItem::updateOrCreate([
            'user_id' => Auth::id()
        ], [
            'data' => $cart,
        ]);

        /////////////////////
        $item = CartItem::where('user_id', '=', Auth::id())->first();
        $dbcart = $item->data;
        if ($dbcart == null) {
            $dbcart = [];
        }
        if ($dbcart == []) {
            return redirect('cart');
        }
        if (Auth::user()->role == 1) {
            return redirect('home');
        }
        return view('cart.checkout')->with('cartItems', $dbcart);
    }

    public function placeOrder()
    {
        $item = CartItem::where('user_id', '=', Auth::id())->first();
        $dbcart = $item->data;
        if ($dbcart == null) {
            $dbcart = [];
        }

        request()->validate(
            [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email',
                'country' => 'required',
                'address1' => 'required',
                'postcode' => 'required',
                'nameOnCard' => 'required',
                'cardNumber' => 'required|digits:16',
                'expiryDate' => 'required',
                'CVV' => 'required|digits:3',
            ],
            [
                'CVV.required' => 'Enter the 3 digit CVV code',
                'CVV.digits' => 'Invalid CVV'
            ]
        );

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_items' => $dbcart,
            'price' => request('price'),
        ]);

        OrderAddress::create([
            'order_id' => $order->id,
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
        return redirect('/profile');
    }
}
