@extends('layouts.adminlte')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1>Edit Order</h1>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Form to edit order details -->
                    <form method="POST" action="{{ route('admin.updateOrder', ['orderId' => $order->id]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Editable Fields (e.g., shipping address, billing information) -->
                        <div class="form-group">
                            <label for="shipping_address">Shipping Address:</label>
                            <input type="text" id="shipping_address" name="shipping_address" value="{{ $order->shipping_address }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="billing_information">Billing Information:</label>
                            <input type="text" id="billing_information" name="billing_information" value="{{ $order->billing_information }}" class="form-control">
                        </div>

                        <!-- Add more editable fields as needed -->

                        <button type="submit" class="btn btn-primary">Update Order</button>
                        <a href="{{ route('admin.orderDetails', ['orderId' => $order->id]) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
