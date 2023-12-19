@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>Bank Transfer Payment</h2>
        <p>Make a payment using Bank Transfer:</p>
        
        <form action="{{ route('payment.process', ['method' => 'bank']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="account_number">Account Number:</label>
                <input type="text" name="account_number" class="form-control" required>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
