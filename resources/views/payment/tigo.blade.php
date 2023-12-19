@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>Tigo Pesa Payment</h2>
        <p>Make a payment using Tigo Pesa:</p>
        
        <form action="{{ route('payment.process', ['method' => 'tigo']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tigo_number">Tigo Pesa Number:</label>
                <input type="text" name="tigo_number" class="form-control" required>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
