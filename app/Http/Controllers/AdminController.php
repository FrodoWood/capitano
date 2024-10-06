<?php

namespace App\Http\Controllers;

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
}
