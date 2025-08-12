@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.admin')

        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Manage Drivers</h4>
                <a href="{{ route('admin.drivers.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add Driver
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Driver</th>
                        <th>Park</th>
                        <th>Status</th>
                        <th>Experience</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                        <tr>
                            <td>{{ $driver->full_name }}</td>
                            <td>{{ $driver->primary_park }}</td>
                            <td>
                                <span class="badge bg-{{ $driver->status == 'Active' ? 'success' : 'secondary' }}">
                                    {{ $driver->status }}
                                </span>
                            </td>
                            <td>{{ $driver->years_of_experience }} yrs</td>
                            <td>{{ $driver->joined_date }}</td>
                            <td>
                                <a href="#" class="text-primary">Edit</a> |
                                <a href="#" class="text-danger">Deactivate</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
