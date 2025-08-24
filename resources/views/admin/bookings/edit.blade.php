@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Smaller, centered form container -->
        <div class="col-md-6 col-lg-5 p-4 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Booking</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Customer -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Customer</label>
                                <select name="customer_id" class="form-select" required>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->customer_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Park -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Park</label>
                                <input type="text" name="park" class="form-control" value="{{ $booking->park }}" required>
                            </div>

                            <!-- Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" value="{{ $booking->date }}" required>
                            </div>

                            <!-- Driver -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Driver</label>
                                <select name="driver_id" class="form-select">
                                    <option value="">Unassigned</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}" {{ $booking->driver_id == $driver->id ? 'selected' : '' }}>
                                            {{ $driver->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="New" {{ $booking->status == 'New' ? 'selected' : '' }}>New</option>
                                    <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <!-- Action buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary me-2">Back</a>
                                <button type="submit" class="btn btn-success">Update Booking</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
    </div>
</div>
@endsection
