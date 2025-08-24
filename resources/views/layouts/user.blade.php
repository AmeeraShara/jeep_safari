@php
    // If you are passing $customer to the view
    // or fetch from DB using auth user ID
    $customer = $customer ?? \App\Models\Customer::find(1); // fallback to ID 1
@endphp

<div class="col-md-3 col-lg-2 bg-white p-3 shadow-sm">
    <div class="text-center mb-4 bg-success text-white rounded p-3">
        <div class="rounded-circle bg-light text-success mx-auto d-flex align-items-center justify-content-center"
             style="width:80px; height:80px; font-size:24px; font-weight:bold;">
            {{ strtoupper(substr($customer->customer_name, 0, 2)) }}
        </div>
        <h6 class="mt-2 mb-0">{{ $customer->customer_name }}</h6>
        <small>{{ $customer->email }}</small>
    </div>

    <!-- Sidebar Navigation -->
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('user.profile', $customer->id) }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.profile') ? 'text-success fw-bold active' : 'text-dark' }}">
                <i class="fa fa-user me-2"></i> My Profile
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('user.bookings') }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.bookings') ? 'text-success fw-bold active' : 'text-dark' }}">
                <i class="fa fa-calendar-check me-2"></i> My Bookings
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('user.payment', ['customer' => $customer->id]) }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.payment') ? 'text-success fw-bold active' : 'text-dark' }}">
                <i class="fa fa-credit-card me-2"></i> Payment Methods
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('user.notifications') }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.notifications') ? 'text-success fw-bold active' : 'text-dark' }}">
                <i class="fa fa-bell me-2"></i> Notifications
            </a>
        </li>

        <li class="nav-item mt-3">
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link nav-link text-danger d-flex align-items-center p-0">
                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
