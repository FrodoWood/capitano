<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // dashboard page
    public function index()
    {
        $products = Product::all();
        $cart = session()->get('cart');

        if ($cart == null) {
            $cart = [];
        }
        return view('home', ['products' => $products, 'cart' => $cart]);
    }

    public function addToCard(Request $request)
    {
        session()->put('cart', $request->post('cart'));
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
