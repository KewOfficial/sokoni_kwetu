<!-- resources/views/payment/mpesa.blade.php -->

@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>M-Pesa Payment</h2>
        <p>Make a payment using M-Pesa:</p>
        <form action="{{ route('payment.process', ['method' => 'mpesa']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
