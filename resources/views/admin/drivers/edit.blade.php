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
                    <h5 class="mb-0">Edit Driver</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.drivers.update', $driver->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="form-control" 
                                       value="{{ old('full_name', $driver->full_name) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" 
                                       value="{{ old('email', $driver->email) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" 
                                       value="{{ old('phone_number', $driver->phone_number) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Years of Experience</label>
                                <input type="number" name="years_of_experience" class="form-control" 
                                       value="{{ old('years_of_experience', $driver->years_of_experience) }}" required>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label>Joined Date</label>
                                <input type="date" name="joined_date" class="form-control" 
                                       value="{{ old('joined_date', $driver->joined_date) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Primary Park</label>
                                <input type="text" name="primary_park" class="form-control" 
                                       value="{{ old('primary_park', $driver->primary_park) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>License Number</label>
                                <input type="text" name="license_number" class="form-control" 
                                       value="{{ old('license_number', $driver->license_number) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Vehicle</label>
                                <input type="text" name="vehicle" class="form-control" 
                                       value="{{ old('vehicle', $driver->vehicle) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Language</label>
                                <input type="text" name="language" class="form-control" 
                                       value="{{ old('language', $driver->language) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="active" {{ old('status', $driver->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $driver->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('admin.drivers.index') }}" class="btn btn-secondary me-2">Back</a>
                                <button type="submit" class="btn btn-success">Update Driver</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
    </div>
</div>
@endsection
