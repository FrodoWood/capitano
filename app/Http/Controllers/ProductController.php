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
        $menProducts = Product::where('gender', '=', '0')->get();
        $womenProducts = Product::where('gender', '=', '1')->get();
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

        // if (Auth::check()) {
        //     CartItem::updateOrCreate([
        //         'user_id' => Auth::id()
        //     ], [
        //         'data' => $cart,
        //     ]);
        // }

        return view('home', ['menProducts' => $menProducts, 'womenProducts' => $womenProducts, 'cart' => $cart]);
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
    public function matching_sports_bra_and_leggins(){
        return view('products.matching_sports_bra_and_leggins');
    
    }
    public function mens_joggers(){
        return view('products.mens_joggers');
    
    }
    public function women_crop_top(){
        return view('products.women_crop_top');
    
    }
    public function men_shorts(){
        return view('products.men_shorts');
    
    }
    public function women_top(){
        return view('products.women_top');
    
    }
    public function mens_top(){
        return view('products.mens_top');
    
    }


}
