@extends('layouts.cart-layout')

@section('content')

<div class="cart">
    <h1>Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->count() > 0)
        <ul class="cart-items">
            @foreach($cartItems as $cartItem)
                <li class="cart-item">
                    <div class="product-image">
                        <img src="{{ $cartItem->product->image_url }}" alt="{{ $cartItem->product->name }}">
                    </div>
                    <div class="product-details">
                        <h2>{{ $cartItem->product->name }}</h2>
                        <p class="quantity">Quantity: {{ $cartItem->quantity }}</p>
                        <p class="price">Price: ${{ $cartItem->product->price }}</p>
                    </div>
                </li>
            @endforeach
        </ul>

        @if(isset($totalPrice))
            <p class="total-price">Total Price: ${{ $totalPrice }}</p>
        @endif

    @else
        <p class="empty-cart">Your cart is empty.</p>
    @endif
</div>

@endsection
