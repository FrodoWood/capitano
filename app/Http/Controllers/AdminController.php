<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

        // var_dump($orders);
        return view('admin')->with('orders', $orders);
    }
}
