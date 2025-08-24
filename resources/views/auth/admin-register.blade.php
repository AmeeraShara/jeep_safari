@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow-sm p-4" style="width:400px;">
        <h4 class="mb-3 text-center">Create Admin Account</h4>
        <form action="{{ url('/register/admin') }}" method="POST">
            @csrf
            <input type="text" name="name" class="form-control mb-2" placeholder="Full Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Password" required>
            <button class="btn btn-success w-100">Sign Up</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
