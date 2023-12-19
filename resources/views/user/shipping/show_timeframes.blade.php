@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h1>Delivery Timeframes</h1>
        <p>Check the estimated delivery timeframes for our shipping options:</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Delivery Method</th>
                    <th>Timeframe</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Standard Shipping</td>
                    <td>3-5 business days</td>
                </tr>
                <tr>
                    <td>Express Shipping</td>
                    <td>1-2 business days</td>
                </tr>
                <tr>
                    <td>Same-Day Delivery</td>
                    <td>Within hours (local areas)</td>
                </tr>
               
            </tbody>
        </table>
        <p>Plan your delivery based on the estimated timeframes for a hassle-free shopping experience.</p>
    </div>
@endsection