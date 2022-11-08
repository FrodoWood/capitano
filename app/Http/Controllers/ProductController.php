<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('show', ['products' => $products]);
    }

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
