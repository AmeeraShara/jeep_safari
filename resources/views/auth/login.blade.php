@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow-sm p-4" style="width:400px; border-radius:10px;">
        <h4 class="text-center mb-2 fw-bold">Welcome Back</h4>
        <p class="text-center text-muted">Sign in to access your account</p>

        <!-- Role Selection with Icons (flat style, no box) -->
        <div class="d-flex justify-content-center mb-3">
            <ul class="nav" id="roleTabs">
                <li class="nav-item">
                    <a class="nav-link role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#user">
                        <i class="fas fa-user fa-lg mb-1"></i>
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#admin">
                        <i class="fas fa-user-shield fa-lg mb-1"></i>
                        Admin
                    </a>
                </li>
                <li class="nav-item">
                    <!-- Driver active by default -->
                    <a class="nav-link active role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#driver">
                        <i class="fas fa-truck fa-lg mb-1"></i>
                        Driver
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <!-- User Login -->
            <div class="tab-pane fade" id="user">
                <form method="POST" action="{{ url('/login/customer') }}">
                    @csrf
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ url('/forgot-password') }}" class="text-success small">Forgot your password?</a>
                    </div>

                    <button class="btn btn-success w-100">Sign In</button>
                </form>
            </div>

            <!-- Admin Login -->
            <div class="tab-pane fade" id="admin">
                <form method="POST" action="{{ url('/admin/home') }}">
                    @csrf
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ url('/forgot-password') }}" class="text-success small">Forgot your password?</a>
                    </div>
                    <button class="btn btn-success w-100">Sign In</button>
                </form>
            </div>

            <!-- Driver Login (default visible) -->
            <div class="tab-pane fade show active" id="driver">
                <form method="POST" action="{{ url('/login/driver') }}">
                    @csrf
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ url('/forgot-password') }}" class="text-success small">Forgot your password?</a>
                    </div>
                    <button class="btn btn-success w-100">Sign In</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <small>Don’t have an account? 
                <a href="{{ url('/register') }}" class="text-success">Sign up</a>
            </small>
        </div>
    </div>
</div>

<!-- Add FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Custom CSS -->
<style>
    .role-tab {
        color: #555;
        font-weight: 500;
        margin: 0 10px;
        transition: 0.3s;
    }

    .role-tab i {
        font-size: 22px;
        margin-bottom: 3px;
    }

    .role-tab.active {
        color: #28a745; /* green for active */
        font-weight: 600;
    }
</style>
@endsection
