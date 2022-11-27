<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if ($orders == null) {
            $orders = [];
        }
        $products = Product::all();
        if ($products == null) {
            $products = [];
        }
        // var_dump($orders);
        return view('admin')->with('orders', $orders)->with('products', $products);
    }
}
