@extends('layouts.adminlte-layout')

@section('content')
    <div class="container">
        <div class="alert alert-danger mt-3">
            <strong>Error!</strong> {{ $message }}
        </div>
    </div>
@endsection
