@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>Cash on Delivery Payment</h2>
        <p>Make a payment using Cash on Delivery:</p>
        
    
        <form action="{{ route('payment.process', ['method' => 'cod']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="address">Delivery Address:</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
