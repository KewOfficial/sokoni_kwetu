<!-- resources/views/payment/pesapal.blade.php -->

@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>PesaPal Payment</h2>
        <p>Make a payment using PesaPal:</p>
        
      
        <form action="{{ route('payment.process', ['method' => 'pesapal']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="pesapal_email">PesaPal Email:</label>
                <input type="email" name="pesapal_email" class="form-control" required>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
