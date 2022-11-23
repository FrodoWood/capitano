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
        $cart = session()->get('cart');
        // var_dump($cart);
        //$dbcart = json_encode($dbcart);
        //var_dump($dbcart);
        $item = CartItem::where('user_id', '=', Auth::id())->firstOrFail();
        $dbcart = $item->data;
        //var_dump($dbcart);



        // Setting to empty array if cart is null
        if ($cart == null) {
            $cart = [];
        }
        if ($dbcart == null) {
            $dbcart = [];
        }

        $combinedCart = array_merge($dbcart, $cart);
        //var_dump($combinedCart);
        //var_dump($cart);
        //var_dump($dbcart);

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
