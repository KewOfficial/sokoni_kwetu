@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>Airtel Money Payment</h2>
        <p>Make a payment using Airtel Money:</p>
        
       
        <form action="{{ route('payment.process', ['method' => 'airtel']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="airtel_number">Airtel Money Number:</label>
                <input type="text" name="airtel_number" class="form-control" required>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
