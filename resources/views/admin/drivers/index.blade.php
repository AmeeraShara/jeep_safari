@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.admin')

        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Manage Drivers</h4>
                <a href="{{ route('admin.drivers.create') }}" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Add Driver
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Filter Form aligned right (same style as All Users) -->
            <form method="GET" action="{{ route('admin.drivers.index') }}" 
                  class="d-flex justify-content-end align-items-center mb-3 gap-2 flex-nowrap" 
                  style="flex-wrap: nowrap;">

                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" 
                        style="width: 120px; font-size: 0.75rem; padding: 0.15rem 0.3rem;">
                    <option value="">All Status</option>
                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>

                <select name="park" class="form-select form-select-sm" onchange="this.form.submit()" 
                        style="width: 120px; font-size: 0.75rem; padding: 0.15rem 0.3rem;">
                    <option value="">All Parks</option>
                    @foreach($parks as $park)
                        <option value="{{ $park }}" {{ request('park') == $park ? 'selected' : '' }}>{{ $park }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success btn-sm" 
                        style="width: 120px; font-size: 0.75rem; padding: 0.25rem 0.5rem;">
                    Filter
                </button>
            </form>

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
                    @forelse($drivers as $driver)
                        <tr>
                            <td>{{ $driver->full_name }}</td>
                            <td>{{ $driver->primary_park }}</td>
                            <td>
                                <span class="badge {{ $driver->status == 'Active' ? 'bg-success bg-opacity-25 text-success' : 'bg-secondary bg-opacity-25 text-secondary' }}">
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No drivers found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
