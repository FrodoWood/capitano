<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
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

        $customers = User::where('role', '=', '0')->get();
        // var_dump($customers);
        return view('admin.admin')->with('orders', $orders)->with('products', $products)->with('customers', $customers);
    }

    public function getProducts(){
        $products = Product::all();
        return view('admin.adminProducts')->with('products', $products);
    }

    public function getProductCategories(){
        $categories = Category::all();
        return view('admin.adminProductCategories')->with('categories', $categories);
    }
}
