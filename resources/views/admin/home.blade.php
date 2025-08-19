@extends('layouts.app')
@php
use App\Models\Driver;
@endphp

@php
use App\Models\Booking;
@endphp

@php
use App\Models\customer;
@endphp

@php
$recentBookings = Booking::latest()->take(5)->get();
@endphp

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
                            <h4 class="mt-2">{{ Booking::count() }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x mb-2 text-success"></i>
                            <h6 class="mb-0">Active Drivers</h6>
                            <h4 class="mt-2">{{ Driver::where('status', 'Active')->count() }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-user fa-2x mb-2 text-success"></i>
                            <h6 class="mb-0">Registered Users</h6>
                            <h4 class="mt-2">{{ Customer::count() }}</h4>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    Recent Bookings
                    <a href="{{ route('admin.bookings.index') }}" class="text-success text-decoration-none">View All</a>
                </div>
                <div class="card-body p-0">
                    @if($recentBookings->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Customer</th>
                                    <th>Park</th>
                                    <th>Date</th>
                                    <th>Driver</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentBookings as $booking)
                                <tr>
                                    <td>{{ $booking->customer->customer_name ?? 'N/A' }}</td>
                                    <td>{{ $booking->park }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d') }}</td>
                                    <td>{{ $booking->driver->full_name ?? 'Unassigned' }}</td>
                                    <td>
                                        @if($booking->status == 'Confirmed')
                                        <span class="badge bg-success">{{ $booking->status }}</span>
                                        @elseif($booking->status == 'Pending')
                                        <span class="badge bg-warning text-dark">{{ $booking->status }}</span>
                                        @elseif($booking->status == 'New')
                                        <span class="badge bg-primary">{{ $booking->status }}</span>
                                        @elseif($booking->status == 'Cancelled')
                                        <span class="badge bg-danger">{{ $booking->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-muted m-3">No recent bookings to display.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection