<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // dashboard page
    public function index()
    {
        $products = Product::all();
        $cart = [];

        if (Auth::check()) {
            $item = CartItem::where('user_id', '=', Auth::id())->first();
            if ($item != null) {
                $dbcart = $item->data;
                $cart = $dbcart;
            }
        } else {
            $cart = session()->get('cart');
        }

        if ($cart == null) {
            $cart = [];
        }

        // if (Auth::check()) {
        //     CartItem::updateOrCreate([
        //         'user_id' => Auth::id()
        //     ], [
        //         'data' => $cart,
        //     ]);
        // }

        return view('home', ['products' => $products, 'cart' => $cart]);
    }

    public function addToCart(Request $request)
    {


        if (Auth::check()) {
            $cart = $request->post('cart');
            if ($cart == null) {
                $cart = [];
            }
            CartItem::updateOrCreate([
                'user_id' => Auth::id()
            ], [
                'data' => $cart,
            ]);
            return;
        }


        session()->put('cart', $request->post('cart'));
        $cart = session()->get('cart');


        return response()->json([
            'status' => 'added'
        ]);
    }

    // Single product page
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function menProducts()
    {
        $products = Product::all();
        return view('products.men', ['products' => $products]);
    }

    public function womenProducts()
    {
        $products = Product::all();
        return view('products.women', ['products' => $products]);
    }
}
