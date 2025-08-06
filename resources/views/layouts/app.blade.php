<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jeep Safari</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Your custom CSS -->
    <style>
        footer {
            background: #000;
            color: #fff;
            padding: 40px 0;
        }
        footer h6 {
            font-weight: bold;
        }
        footer ul {
            list-style: none;
            padding: 0;
        }
        footer ul li {
            margin-bottom: 8px;
        }
        footer a {
            color: #fff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('jeep.jpeg') }}" alt="Jeep Safari Logo">
                <strong>Jeep Safari</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Safari</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login <i class="fas fa-user ms-1"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-3 mb-4">
                    <h6>NAVIGATION</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Safari</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>STAY CONNECTED</h6>
                    <a href="#" class="me-2"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>PICK UP AREAS</h6>
                    <ul>
                        <li>Yala</li>
                        <li>Minneriya</li>
                        <li>Dambulla</li>
                        <li>Polonnaruwa</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 text-center">
                    <h6>Jeep safari Sri Lanka</h6>
                    <img src="{{ asset('jeep.jpeg') }}" alt="Jeep Image" class="img-fluid rounded-circle mt-2" style="width: 80px;">
                </div>
            </div>
            <div class="text-center pt-3">
                <small>Powered by NetIT Technology</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
