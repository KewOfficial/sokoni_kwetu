@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h2>Credit/Debit Card Payment</h2>
        <p>Make a payment using your Credit/Debit Card:</p>
        <form action="{{ route('payment.process', ['method' => 'card']) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date:</label>
                <input type="text" name="expiry_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
