<div class="col-md-3 col-lg-2 p-0 bg-success text-white min-vh-100">
    <div class="d-flex flex-column h-100">
        <div class="text-center py-4 border-bottom border-white">
            <i class="fas fa-shield-alt fa-2x mb-2"></i>
            <h5 class="mb-0">Admin Panel</h5>
            <small>Jeep Safari</small>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a
                    class="nav-link text-white {{ Request::is('admin/home') ? 'active fw-bold' : '' }}"
                    href="{{ url('/admin/home') }}"
                    {{ Request::is('admin/home') ? 'aria-current=page' : '' }}>
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-calendar-alt me-2"></i> Bookings
                </a>
            </li>

            <!-- Drivers -->
            <li class="nav-item">
                <a
                    class="nav-link text-white {{ Request::is('admin/drivers*') ? 'active fw-bold' : '' }}"
                    href="{{ route('admin.drivers.index') }}"
                    {{ Request::is('admin/drivers*') ? 'aria-current=page' : '' }}>
                    <i class="fas fa-users me-2"></i> Drivers
                </a>
            </li>

            <li class="nav-item">
                <a
                    class="nav-link text-white {{ Request::is('admin/users*') ? 'active fw-bold' : '' }}"
                    href="{{ route('admin.users.index') }}"
                    {{ Request::is('admin/users*') ? 'aria-current=page' : '' }}>
                    <i class="fas fa-user me-2"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
            <li class="nav-item mt-auto">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-white border-0 bg-transparent w-100 text-start">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>

        </ul>
    </div>
</div>