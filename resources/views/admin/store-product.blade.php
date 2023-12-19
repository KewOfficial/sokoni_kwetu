@extends('layouts.adminlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Store Product</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Display a success message if redirected from the storeProduct action -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Details</h3>
                </div>
                <div class="box-body">
                </div>
            </div>
            <a href="{{ route('admin.addProduct') }}" class="btn btn-primary">Go Back to Add Product</a>
        </section>
    </div>
@endsection