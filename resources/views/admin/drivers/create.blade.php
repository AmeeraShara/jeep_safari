@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.admin')

        <div class="col-md-9 col-lg-10 p-4">
            <h4>Add Driver</h4>
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
                        <select name="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Driver</button>
            </form>
        </div>
    </div>
</div>
@endsection
