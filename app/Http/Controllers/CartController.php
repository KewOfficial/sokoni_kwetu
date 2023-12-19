<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; 
use App\Models\Product;
class CartController extends Controller
{
    public function index()
    {
        // Display the cart items and the total price
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    public function viewCart()
    {
        // Display the cart items
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        return view('cart.view', ['cartItems' => $cartItems]);
    }

    public function addToCart($productId)
    {
        // You should validate the product ID and handle any validation errors here
    
        // Find the product based on the given ID
        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Check if the user is authenticated
        if (auth()->check()) {
            $userId = auth()->user()->id;
    
            // Check if the product is already in the user's cart
            $cartItem = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();
    
            if ($cartItem) {
                // If the product is already in the cart, increase the quantity
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                // If the product is not in the cart, create a new cart item
                $cartItem = new Cart();
                $cartItem->user_id = $userId;
                $cartItem->product_id = $productId;
                $cartItem->quantity = 1;
                $cartItem->save();
            }
    
            return redirect()->back()->with('success', 'Product added to cart.');
        } else {
           
            return redirect()->back()->with('error', 'You need to be logged in to add products to your cart.');
        }
    }
    

    public function removeFromCart($cartItemId)
    {
        // Remove a product from the cart

        // You should validate the cart item ID and handle any validation errors

        // Find and delete the cart item
        $cartItem = Cart::where('id', $cartItemId)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}
