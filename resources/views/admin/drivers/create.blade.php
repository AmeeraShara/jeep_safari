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
                    <h5 class="mb-0">Add New Driver</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.drivers.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Years of Experience</label>
                                <input type="number" name="years_of_experience" class="form-control" min="0" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Joined Date</label>
                                <input type="date" name="joined_date" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Primary Park</label>
                                <input type="text" name="primary_park" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>License Number</label>
                                <input type="text" name="license_number" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Vehicle</label>
                                <input type="text" name="vehicle" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Language</label>
                                <input type="text" name="language" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('admin.drivers.index') }}" class="btn btn-secondary me-2">Back</a>
                                <button type="submit" class="btn btn-success">Save Driver</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
