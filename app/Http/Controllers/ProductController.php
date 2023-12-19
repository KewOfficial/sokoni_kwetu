<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
{
    // Retrieve and pass product data to the view
    $products = Product::all();
    return view('products.browse', ['products' => $products]);
}
public function searchProducts(Request $request)
{
    $searchQuery = $request->input('query');

    $products = Product::where('name', 'like', '%' . $searchQuery . '%')
        ->orWhere('description', 'like', '%' . $searchQuery . '%')
        ->get();

    return view('products.search', ['products' => $products, 'searchQuery' => $searchQuery]);
}


    public function browseProducts()
    {
        // Retrieve and pass product data to the view
        $products = Product::all();
        return view('products.browse', ['products' => $products]);
    }

    public function viewProduct($productId)
    {
        // Retrieve the product details and pass them to the view
        $product = Product::find($productId);
        return view('products.view', ['product' => $product]);
    }
}
