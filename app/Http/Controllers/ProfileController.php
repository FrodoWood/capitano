<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $orders = Order::where('user_id', '=', Auth::id())->get();
            if ($orders == null) {
                $orders = [];
            }
        }
        // var_dump($orders_details);
        return view('profile')->with('orders', $orders);
    }
}
