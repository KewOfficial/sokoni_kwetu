<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Retrieve the user's order history and pass it to the view
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('orders.index', ['orders' => $orders]);
    }

    public function placeOrder()
    {
        // Implement logic for placing an order, including order creation and payment processing
        return redirect()->route('order.history')->with('success', 'Order placed successfully.');
    }

   

    public function viewOrderHistory()
    {
        // Retrieve the user's order history and pass it to the view
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders.history', ['orders' => $orders]);
    }
}
