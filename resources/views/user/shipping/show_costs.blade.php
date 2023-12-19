@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <h1>Shipping Costs</h1>
        <p>Explore the shipping costs associated with our various delivery methods:</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Delivery Method</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Standard Shipping</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>Express Shipping</td>
                    <td>$10.00</td>
                </tr>
                <tr>
                    <td>Same-Day Delivery</td>
                    <td>$15.00</td>
                </tr>
               
            </tbody>
        </table>
        <p>Our transparent pricing ensures you know the cost upfront for a seamless shopping experience.</p>
    </div>
@endsection
