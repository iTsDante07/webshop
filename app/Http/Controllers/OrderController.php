<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function myOrders()
    {
        $orders = Sale::with(['product', 'buyer', 'seller'])
                    ->where('buyer_id', Auth::id())
                    ->get();

        return view('orders.my_orders', compact('orders'));
    }
}
