@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>Payment Methods</h2>
        <p>Choose your preferred payment method:</p>
        <ul>
            <li><a href="{{ route('payment.process', ['method' => 'mpesa']) }}">M-Pesa</a></li>
            <li><a href="{{ route('payment.process', ['method' => 'card']) }}">Credit/Debit Card</a></li>
            <li><a href="{{ route('payment.process', ['method' => 'bank']) }}">Bank Transfer</a></li>
            <li><a href="{{ route('payment.process', ['method' => 'tigo']) }}">Tigo Pesa</a></li>
            <li><a href="{{ route('payment.process', ['method' => 'airtel']) }}">Airtel Money</a></li>
            <li><a href="{{ route('payment.process', ['method' => 'cod']) }}">Cash on Delivery</a></li>
            <li><a href="{{ route('payment.process', ['method' => 'pesapal']) }}">PesaPal</a></li>
        </ul>
    </div>
@endsection
