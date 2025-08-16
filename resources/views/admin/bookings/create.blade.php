@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.admin')

        <!-- Main Content - smaller, centered -->
        <div class="col-md-6 col-lg-5 p-4 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create New Booking</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bookings.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="customer_id" class="form-label">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control" required>
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="driver_id" class="form-label">Driver</label>
                                <select name="driver_id" id="driver_id" class="form-control">
                                    <option value="">Select Driver</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="park" class="form-label">Park</label>
                                <input type="text" name="park" id="park" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary me-2">Back</a>
                                <button type="submit" class="btn btn-success">Create Booking</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
