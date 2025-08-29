<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jeep Safari</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-size: 14px;
            /* smaller global font */
        }

        footer {
            background: #000;
            color: #fff;
            padding: 25px 0;
            /* less padding */
            font-size: 13px;
        }

        footer h6 {
            font-weight: bold;
            font-size: 13px;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 6px;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .navbar-brand img {
            height: 25px;
            /* smaller logo */
            margin-right: 8px;
        }

        .navbar {
            font-family: 'Segoe UI', sans-serif;
            letter-spacing: 0.5px;
            padding-top: 6px !important;
            padding-bottom: 6px !important;
            /* slimmer navbar */
        }

        .navbar .nav-link {
            color: #000;
            transition: color 0.2s ease-in-out;
            font-size: 14px;
            /* smaller nav text */
        }

        .navbar .nav-link:hover {
            color: #28a745;
        }

        main {
            padding-top: 10px;
            /* reduce spacing */
            padding-bottom: 10px;
        }

        footer img {
            width: 65px;
            /* smaller footer logo */
        }

        footer h6 {
            font-size: 14px;
            margin-bottom: 12px;
            color: #000;
        }

        footer a {
            text-decoration: none;
            color: #006400;
            /* dark green like Tripadvisor */
            font-size: 13px;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer hr {
            opacity: 0.2;
        }

        footer small {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm border-bottom px-3">
        <div class="container-fluid">
            <!-- Logo + Title -->
            <a class="navbar-brand d-flex align-items-center fw-bold fs-6" href="{{ route('home') }}">
                <img src="{{ asset('jeep.jpeg') }}" alt="Jeep Safari Logo" class="me-2">
                Jeep Safari
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right Navigation -->
            <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#">Safari</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('contact') }}">Contact Us</a></li>

                    @guest
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('login') }}">
                            Login <i class="fas fa-user ms-1"></i>
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-semibold dropdown-toggle" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name ?? Auth::user()->full_name ?? 'User' }}
                            <i class="fas fa-user ms-1"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto bg-light border-top pt-4 pb-3" style="font-size:14px;">
        <div class="container">
            <!-- Top Columns -->
            <div class="row text-center text-md-start">
                <!-- About -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold">About Jeep Safari</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Policies</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Explore -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold">Explore</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('review.create') }}">Write a Review</a></li>
                        <li><a href="#">Safari Packages</a></li>
                        <li><a href="#">Travel Stories</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>

                <!-- Do Business -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold">Do Business With Us</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Partner With Us</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                        <li><a href="#">API Access</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold">Our Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Wildlife Tours</a></li>
                        <li><a href="#">Camping</a></li>
                        <li><a href="#">Cultural Tours</a></li>
                        <li><a href="#">Holiday Rentals</a></li>
                    </ul>
                </div>
            </div>

            <hr>

            <!-- Middle Row -->
            <div class="row align-items-center">
                <!-- Logo + Copy -->
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <img src="{{ asset('jeep.jpeg') }}" alt="Jeep Logo" width="40" class="me-2 rounded-circle">
                    <small class="text-muted">© 2025 Jeep Safari Sri Lanka. All rights reserved.</small>
                </div>

                <!-- Legal Links -->
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <a href="#" class="me-3">Terms of Use</a>
                    <a href="#" class="me-3">Privacy Policy</a>
                    <a href="#" class="me-3">Cookie Policy</a>
                    <a href="#">Site Map</a>
                </div>

                <!-- Currency + Country -->
                <div class="col-md-4 text-center text-md-end">
                    <select class="form-select d-inline-block w-auto me-2" style="font-size:13px;">
                        <option>$ USD</option>
                        <option>€ EUR</option>
                        <option>£ GBP</option>
                    </select>
                    <select class="form-select d-inline-block w-auto" style="font-size:13px;">
                        <option>Sri Lanka</option>
                        <option>United States</option>
                        <option>India</option>
                    </select>
                </div>
            </div>

            <!-- Social Icons -->
            <div class="text-center mt-3">
                <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="me-3"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="me-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="me-3"><i class="fab fa-youtube fa-lg"></i></a>
                <a href="#"><i class="fab fa-tiktok fa-lg"></i></a>
            </div>

            <!-- Disclaimer -->
            <div class="text-center mt-3">
                <small class="text-muted d-block" style="max-width:900px; margin:auto;">
                    Jeep Safari Sri Lanka makes no guarantees for availability of tours and services listed on our site.
                    Prices may vary depending on dates, conditions, and local regulations.
                    <a href="#" class="fw-bold">Read more</a>
                </small>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>