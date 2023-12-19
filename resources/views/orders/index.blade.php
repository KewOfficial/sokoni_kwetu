@extends('layouts.orders-layout')

@section('content')
    <div class="orders">
        <h1>Order History</h1>
        @if(count($orders) > 0)
            <ul>
                @foreach($orders as $order)
                    <li>Order ID: {{ $order->id }}, Date: {{ $order->created_at }}</li>
                @endforeach
            </ul>
        @else
            <p>You don't have any orders yet.</p>
        @endif
    </div>
@endsection
