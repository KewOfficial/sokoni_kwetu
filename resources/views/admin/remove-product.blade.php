@extends('layouts.adminlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Remove Product</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('admin.removeProduct', ['product' => $product]) }}" method="post">
                @csrf
                @method('DELETE')
                <p>Are you sure you want to remove this product?</p>
                <button type="submit">Remove Product</button>
            </form>
            
            
        </section>
    </div>
@endsection
