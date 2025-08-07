@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 p-0 bg-success text-white min-vh-100">
            <div class="d-flex flex-column h-100">
                <div class="text-center py-4 border-bottom border-white">
                    <i class="fas fa-shield-alt fa-2x mb-2"></i>
                    <h5 class="mb-0">Admin Panel</h5>
                    <small>Jeep Safari</small>
                </div>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('admin/home') ? 'active fw-bold' : '' }}" href="{{ url('/admin/home') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-calendar-alt me-2"></i> Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-users me-2"></i> Drivers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="">
                            <i class="fas fa-user me-2"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item mt-auto">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <h4 class="mb-3">Admin Dashboard</h4>
            <p class="text-muted">Welcome to your admin dashboard. Here’s an overview of your business.</p>

            <!-- Placeholder for future widgets -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar fa-2x mb-2 text-success"></i>
                            <h6 class="mb-0">Total Bookings</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x mb-2 text-success"></i>
                            <h6 class="mb-0">Active Drivers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-user fa-2x mb-2 text-success"></i>
                            <h6 class="mb-0">Registered Users</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-dollar-sign fa-2x mb-2 text-success"></i>
                            <h6 class="mb-0">Revenue</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Placeholder for recent bookings table -->
            <div class="card shadow-sm">
                <div class="card-header">
                    Recent Bookings
                </div>
                <div class="card-body">
                    <p class="text-muted">No data to display yet.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
