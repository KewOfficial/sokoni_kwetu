@extends('layouts.adminlte')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h5>Order ID: {{ $order->id }}</h5>
                <p>Customer: {{ $order->user->name }}</p>
                <p>Email: {{ $order->user->email }}</p>
                <p>Order Date: {{ $order->created_at }}</p>
                <p>Status: {{ $order->status }}</p>

                <!-- Display order items -->
                <h5>Order Items</h5>
                <ul>
                    @foreach ($order->items as $item)
                        <li>
                            Product: {{ $item->product->name }},
                            Quantity: {{ $item->quantity }},
                            Price: {{ $item->product->price }},
                            Subtotal: {{ $item->quantity * $item->product->price }}
                        </li>
                    @endforeach
                </ul>

                <!-- Action buttons -->
                <div class="mt-3">
                    <a href="{{ route('admin.editOrder', ['orderId' => $order->id]) }}" class="btn btn-primary">Edit Order</a>
                    <a href="{{ route('admin.showUpdateOrderStatusForm', ['orderId' => $order->id]) }}" class="btn btn-warning">Update Status</a>
                    <a href="{{ route('admin.manageOrders') }}" class="btn btn-secondary">Back to Orders</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
