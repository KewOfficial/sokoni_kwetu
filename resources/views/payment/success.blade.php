@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <div class="alert alert-success mt-3">
            <strong>Payment Successful!</strong> {{ $message }}
        </div>
    </div>
@endsection
