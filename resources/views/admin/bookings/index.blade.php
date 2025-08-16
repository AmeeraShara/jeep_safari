@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.admin')

        <div class="col-md-9 p-4">
            <div class="d-flex justify-content-between mb-3">
                <h4>Manage Bookings</h4>
                <a href="{{ route('admin.bookings.create') }}" class="btn btn-success">+ New Booking</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Park</th>
                        <th>Date</th>
                        <th>Driver</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>#{{ $booking->id }}</td>
                        <td>{{ $booking->customer->customer_name }}</td>
                        <td>{{ $booking->park }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->driver->full_name ?? 'Unassigned' }}</td>
                        <td>
                            @if($booking->status == 'Confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif($booking->status == 'Pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($booking->status == 'New')
                                <span class="badge bg-primary">New</span>
                            @else
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('bookings.edit',$booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('bookings.destroy',$booking->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $bookings->links() }}
        </div>
    </div>
</div>
@endsection
