@extends('layouts.app')

@section('content')
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jeep Safari Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        .hero {
            height: 100vh;
            background: url('/images/bg.jpg') no-repeat center center/cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 50px;
            max-width: 700px;
        }

        .glass-card h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
        }

        .btn-explore {
            background-color: white;
            color: black;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-explore:hover {
            background-color: #28a745;
            color: white;
        }

        .highlight-icon {
            font-size: 2rem;
            color: #28a745;
        }

        .counter {
            font-size: 2.5rem;
            font-weight: bold;
            color: #28a745;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="glass-card shadow-lg" data-aos="zoom-in">
        <h1>Explore the Wild Side of Sri Lanka</h1>
        <p class="lead my-4">Join unforgettable jeep safaris through breathtaking national parks and lush jungles.</p>
        <a href="#highlights" class="btn btn-explore px-4 py-2">Explore More</a>
    </div>
</section>

<!-- Why Choose Us Section (No Icons) -->
<section id="highlights" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-aos="fade-up">Why Choose Us</h2>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 shadow-sm border-0 highlight-card">
                    <div class="card-body">
                        <h5 class="card-title">Expert Guides</h5>
                        <p class="card-text">Our team includes trained, experienced naturalists and safari drivers who know the wild inside out.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 shadow-sm border-0 highlight-card">
                    <div class="card-body">
                        <h5 class="card-title">4x4 Jeep Access</h5>
                        <p class="card-text">Reach deep into the national parks with rugged and comfortable off-road jeeps.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 shadow-sm border-0 highlight-card">
                    <div class="card-body">
                        <h5 class="card-title">Wildlife Guaranteed</h5>
                        <p class="card-text">Spot elephants, leopards, crocodiles, and vibrant birds in their natural habitat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="card h-100 shadow-sm border-0 highlight-card">
                    <div class="card-body">
                        <h5 class="card-title">Eco-Conscious</h5>
                        <p class="card-text">We promote sustainable tourism and support local conservation and community efforts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Animated Counters -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="section-title mb-5" data-aos="fade-up">Our Impact</h2>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="counter" data-count="10000">0</div>
                <p>Happy Tourists</p>
            </div>
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="counter" data-count="500">0</div>
                <p>Safaris Completed</p>
            </div>
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="counter" data-count="15">0</div>
                <p>Years Experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Feedback Form -->
<section id="feedback" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-aos="fade-up">We’d Love Your Feedback</h2>
        <div class="row justify-content-center">
            <div class="col-md-8" data-aos="fade-up" data-aos-delay="100">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="/feedback">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success px-4">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap + JS + AOS + Counter Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // lower = faster

    const runCounter = (counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText;
            const increment = Math.ceil(target / speed);

            if (count < target) {
                counter.innerText = count + increment;
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    };

    // Trigger counters when in viewport
    const handleScroll = () => {
        counters.forEach(counter => {
            const rect = counter.getBoundingClientRect();
            if (rect.top < window.innerHeight && !counter.classList.contains('counted')) {
                counter.classList.add('counted');
                runCounter(counter);
            }
        });
    };

    window.addEventListener('scroll', handleScroll);
</script>

</body>
</html>

@endsection
