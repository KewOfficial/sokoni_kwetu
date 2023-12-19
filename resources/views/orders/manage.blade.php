@extends('adminlte')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Manage Orders</h3>
        </div>
        <!-- Manage Orders View -->
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <!-- Add action buttons (e.g., update status) -->
                                <a href="{{ route('orders.updateStatus', ['orderId' => $order->id]) }}" class="btn btn-primary">Update Status</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
