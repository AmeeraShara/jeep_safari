@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:65vh;">
    <div class="card shadow-sm p-2" style="max-width:300px; border-radius:6px; width:100%;">
        <h6 class="text-center fw-bold mb-1">Create Account</h6>
        <p class="text-center text-muted mb-2" style="font-size:11px;">Choose your role and sign up</p>

        <!-- Role Selection -->
        <div class="d-flex justify-content-center mb-2">
            <ul class="nav small-tabs" id="registerTabs">
                <li class="nav-item">
                    <a class="nav-link role-tab active d-flex flex-column align-items-center" data-bs-toggle="tab" href="#user">
                        <i class="fas fa-user mb-1"></i>
                        <small>User</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#admin">
                        <i class="fas fa-user-shield mb-1"></i>
                        <small>Admin</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link role-tab d-flex flex-column align-items-center" data-bs-toggle="tab" href="#driver">
                        <i class="fas fa-truck mb-1"></i>
                        <small>Driver</small>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <!-- User Registration -->
            <div class="tab-pane fade show active" id="user">
                <form action="{{ url('/register/customer') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="customer_name" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control custom-input" required>
                    </div>
                    <button class="btn btn-success w-100 btn-xs mt-1">Sign Up</button>
                </form>
            </div>

            <!-- Admin Registration -->
            <div class="tab-pane fade" id="admin">
                <form action="{{ url('/register/admin') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control custom-input" required>
                    </div>
                    <button class="btn btn-success w-100 btn-xs mt-1">Sign Up</button>
                </form>
            </div>

            <!-- Driver Registration -->
            <div class="tab-pane fade" id="driver">
                <form action="{{ url('/register/driver') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone_number" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">License No.</label>
                        <input type="text" name="license_number" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Experience (yrs)</label>
                        <input type="number" name="years_of_experience" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control custom-input" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control custom-input" required>
                    </div>
                    <button class="btn btn-success w-100 btn-xs mt-1">Sign Up</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-2">
            <small style="font-size: 11px;">Already have an account? 
                <a href="{{ route('login') }}" class="text-success">Sign in</a>
            </small>
        </div>
    </div>
</div>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Custom CSS -->
<style>
    .role-tab {
        color: #555;
        font-weight: 500;
        margin: 0 4px;
        font-size: 11px;
    }

    .role-tab i {
        font-size: 14px;
        margin-bottom: 2px;
    }

    .role-tab.active {
        color: #28a745;
        font-weight: 600;
    }

    .custom-input {
        height: 28px;       /* smaller height */
        font-size: 12px;
        padding: 2px 6px;
    }

    .form-label {
        font-size: 11px;
        margin-bottom: 1px;
    }

    .btn-xs {
        font-size: 12px;
        padding: 4px 0;
    }

    .card h6 {
        font-size: 14px;
    }
</style>
@endsection
