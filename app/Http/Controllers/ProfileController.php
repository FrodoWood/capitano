<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if (Auth::check()) {

            $orders = Order::where('user_id', '=', Auth::id())->get();
            if ($orders == null) {
                $orders = [];
            }
        }

        $cart = [];

        if (Auth::check()) {
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
        } else {
            $cart = session()->get('cart');
        }

        if ($cart == null) {
            $cart = [];
        }
        // var_dump($orders_details);
        return view('profile')->with('orders', $orders)->with('products', $products)->with('cart', $cart);
    }
}
