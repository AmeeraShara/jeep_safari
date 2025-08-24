@extends('layouts.app')

@section('content')
<style>
    /* Optional: Adjust table hover and badge styling like Users page */
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .badge-status {
        padding: 0.25em 0.5em;
        font-size: 0.75rem;
        border-radius: 0.25rem;
    }
</style>

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

            <!-- Drivers Table -->
            <table class="table table-bordered table-hover align-middle">
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
                            <span class="badge badge-status {{ $driver->status == 'Active' ? 'bg-success bg-opacity-25 text-success' : 'bg-secondary bg-opacity-25 text-secondary' }}">
                                {{ $driver->status }}
                            </span>
                        </td>
                        <td>{{ $driver->years_of_experience }} yrs</td>
                        <td>{{ $driver->joined_date }}</td>
                        <td>
                            <a href="{{ route('admin.drivers.edit', $driver->id) }}" class="btn btn-sm me-1" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.drivers.deactivate', $driver->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-danger" title="Deactivate">
                                    <i class="fa-solid fa-user-slash"></i>
                                </button>
                            </form>

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