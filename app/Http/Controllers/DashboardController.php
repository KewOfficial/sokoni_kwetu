<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Initialize $orderStatusData and $orders as empty arrays
        $orderStatusData = [];
        $orders = [];

        if ($user) {
            if ($user->role !== 'admin') {
                // Paginate the user's orders
                $orders = Order::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

                // fetch data for $orderStatusData here if needed

                return view('dashboard', ['user' => $user, 'orders' => $orders, 'orderStatusData' => $orderStatusData]);
            }
            
            // For admin users, fetch admin-specific data for $orderStatusData here if needed

            return view('admin.dashboard', ['user' => $user, 'orders' => $orders, 'orderStatusData' => $orderStatusData]);
        }

        return redirect()->route('login');
    }
}
