@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow-sm p-3" style="width:320px; border-radius:12px; font-family: 'Poppins', sans-serif;">
        <h5 class="text-center mb-2 fw-semibold">Welcome Back</h5>
        <p class="text-center text-muted small mb-2">Sign in to access your account</p>

        <!-- Role Selection -->
        <div class="d-flex justify-content-center mb-1"> <!-- reduced mb to bring form closer -->
            <ul class="nav" id="roleTabs">
                <li class="nav-item">
                    <a class="nav-link role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#user">
                        <i class="fas fa-user fa-lg mb-1"></i>
                        <small>User</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#admin">
                        <i class="fas fa-user-shield fa-lg mb-1"></i>
                        <small>Admin</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#driver">
                        <i class="fas fa-truck fa-lg mb-1"></i>
                        <small>Driver</small>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content mb-1"> <!-- reduced mb to bring footer closer -->
            <!-- User Login -->
            <div class="tab-pane fade" id="user">
                <form method="POST" action="{{ url('/login/customer') }}">
                    @csrf
                    <input type="email" name="email" class="form-control form-control-sm mb-1 rounded-3" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control form-control-sm mb-1 rounded-3" placeholder="Password" required>

                    <div class="d-flex justify-content-between align-items-center mb-1 small">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ url('/forgot-password') }}" class="text-success">Forgot?</a>
                    </div>

                    <button class="btn btn-success btn-sm w-100 rounded-3">Sign In</button>
                </form>
            </div>

            <!-- Admin Login -->
            <div class="tab-pane fade" id="admin">
                <form method="POST" action="{{ url('/admin/home') }}">
                    @csrf
                    <input type="email" name="email" class="form-control form-control-sm mb-1 rounded-3" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control form-control-sm mb-1 rounded-3" placeholder="Password" required>

                    <div class="d-flex justify-content-between align-items-center mb-1 small">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ url('/forgot-password') }}" class="text-success">Forgot?</a>
                    </div>
                    <button class="btn btn-success btn-sm w-100 rounded-3">Sign In</button>
                </form>
            </div>

            <!-- Driver Login (default visible) -->
            <div class="tab-pane fade show active" id="driver">
                <form method="POST" action="{{ url('/login/driver') }}">
                    @csrf
                    <input type="email" name="email" class="form-control form-control-sm mb-1 rounded-3" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control form-control-sm mb-1 rounded-3" placeholder="Password" required>

                    <div class="d-flex justify-content-between align-items-center mb-1 small">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ url('/forgot-password') }}" class="text-success">Forgot?</a>
                    </div>
                    <button class="btn btn-success btn-sm w-100 rounded-3">Sign In</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-1 small"> <!-- reduced mt to bring footer closer -->
            Don’t have an account? 
            <a href="{{ url('/register') }}" class="text-success fw-semibold">Sign up</a>
        </div>
    </div>
</div>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<style>
    .role-tab {
        color: #555;
        font-weight: 500;
        margin: 0 8px;
        transition: 0.3s;
        font-size: 13px;
    }

    .role-tab i {
        font-size: 18px;
    }

    .role-tab.active {
        color: #28a745;
        font-weight: 600;
    }

    .card {
        font-size: 14px;
    }
</style>
@endsection
