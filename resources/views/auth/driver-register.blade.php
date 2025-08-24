@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow-sm p-4" style="width:400px;">
        <h4 class="mb-3 text-center">Create Driver Account</h4>
        <form action="{{ url('/register/driver') }}" method="POST">
            @csrf
            <input type="text" name="full_name" class="form-control mb-2" placeholder="Full Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>
            <input type="text" name="phone_number" class="form-control mb-2" placeholder="Phone Number" required>
            <input type="text" name="license_number" class="form-control mb-2" placeholder="Driver’s License Number" required>
            <input type="number" name="years_of_experience" class="form-control mb-2" placeholder="Years of Experience" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Password" required>
            <button class="btn btn-success w-100">Sign Up</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
