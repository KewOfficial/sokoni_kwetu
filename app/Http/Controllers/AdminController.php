<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function dashboard()
    {
        // Fetch orders with user information
        $orders = Order::with('user')->get();
    
       // Get total number of orders
$totalOrders = $orders->count();

// Get order status distribution for the chart
$orderStatusData = $orders->groupBy('status')->map->count();

// Ensure that you pass $totalOrders to the view
return view('admin.dashboard', compact('totalOrders', 'orderStatusData', 'orders'));
    }
    // Display the add product form
    public function addProduct()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.add-product', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
        ]);
    
        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
        ]);
    
        $product->save();
    
        return redirect()->route('admin.addProduct')->with('success', 'Product added successfully!');
    }
    
    // Remove a product
    public function removeProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.addProduct')->with('success', 'Product removed successfully!');
    }
    
    public function showAddProductForm()
    {
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }    

    // Display the manage orders page
    public function manageOrders()
    {
        $orders = Order::all(); // Retrieve all orders from the database
        return view('admin.manage-orders', ['orders' => $orders]);
    }

    // Display the form to add a product
    public function storeProductView()
    {
        return view('admin.store-product');
    }
    public function orderDetails($orderId)
    {
        $order = Order::findOrFail($orderId);
    
        return view('admin.order-details', ['order' => $order]);
    }

    public function editOrder($orderId)
    {
        $order = Order::findOrFail($orderId);
    
     
        return view('admin.edit-order', ['order' => $order]);
    }
    
    public function updateOrder(Request $request, $orderId)
    {
        // Validation logic goes here if needed
    
        $order = Order::findOrFail($orderId);
    
        // Update order details here
    
        return redirect()->route('admin.orderDetails', ['orderId' => $order->id])
            ->with('success', 'Order updated successfully!');
    }

    public function showUpdateOrderStatusForm($orderId)
    {
        $order = Order::findOrFail($orderId);
    
     
        return view('admin.update-order-status', ['orderId' => $orderId, 'order' => $order]);
    }
    
    public function updateOrderStatus(Request $request, $orderId)
    {
    
        $order = Order::findOrFail($orderId);
    
        return redirect()->route('admin.orderDetails', ['orderId' => $order->id])
            ->with('success', 'Order status updated successfully!');
    }
    // Display the manage users page
    public function manageUsers()
    {
        $users = User::all(); // Retrieve all users from the database
        return view('admin.manage-users', ['users' => $users]);
    }
}
