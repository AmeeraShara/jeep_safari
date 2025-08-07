@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar only for this view -->
        @include('layouts.admin')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <h4 class="mb-3">Admin Dashboard</h4>
            <p class="text-muted">Welcome to your admin dashboard. Here’s an overview of your business.</p>

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
