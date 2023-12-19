@extends('layouts.cart-layout')

@section('content')
<div class="cart">
    <h1>Shopping Cart</h1>
    @if (count($cartItems) > 0)
        <ul>
            @foreach ($cartItems as $cartItem)
                <li>{{ $cartItem->product->name }} - Quantity: {{ $cartItem->quantity }}</li>
            @endforeach
        </ul>
        <p>Total Price: ${{ $totalPrice }}</p>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
