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
        $womenProducts = Product::where('gender', '=', '1')->get();
        $menProducts = Product::where('gender', '=', '0')->get();
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

        // Pass men or women products depending on the selected product's gender, thus I can show more women's products if the current $product belongs to the women category and viceversa for men.
        if ($product->gender == 0) {
            return view('products.show', ['product' => $product, 'products' => $menProducts, 'cart' => $cart]);
        } else {
            return view('products.show', ['product' => $product, 'products' => $womenProducts, 'cart' => $cart]);
        }
    }

    public function menProducts()
    {
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

        $menProducts = Product::where('gender', '=', '0')->get();
        return view('products.men', ['products' => $menProducts, 'cart' => $cart]);
    }

    public function womenProducts()
    {
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

        $womenProducts = Product::where('gender', '=', '1')->get();
        return view('products.women', ['products' => $womenProducts,  'cart' => $cart]);
    }

    public function searchProduct(Request $request)
    {
        $search_text = $request->get('searchQuery');
        $products = Product::all();

        $searchProducts = Product::query()
            ->where('title', 'LIKE', "%{$search_text}%")
            ->orWhere('description', 'LIKE', "%{$search_text}%")
            ->orWhere('price', 'LIKE', "%{$search_text}%")
            ->get();

        return view('products.search', compact('searchProducts'))->with('searchText', $search_text)->with('products', $products);
    }
}
