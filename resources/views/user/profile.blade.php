
@extends('layouts.adminlte-layout') 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>User Profile</h1>
                <div class="card">
                    <div class="card-body">
                        <h4>Name: {{ $user->name }}</h4>
                        <p>Email: {{ $user->email }}</p>
                        <p>Registered at: {{ $user->created_at }}</p>
                        <!-- You can display more user details here as needed -->
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
