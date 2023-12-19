@extends('layouts.adminlte-layout')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Page content goes here -->
            <h1>Browse Products</h1>

            <!-- Your browse products HTML code goes here -->
            @foreach($products as $product)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <!-- Display other product details as needed -->
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- /.content -->
@endsection
