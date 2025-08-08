@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Jeep Safari - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --brand-green: #28a745;
            --muted: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #222;
            background: #fff;
        }

        /* HERO */
        .hero-section {
            position: relative;
            height: 78vh;
            min-height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background-size: cover;
            background-position: center;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.35);
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1100px;
            padding: 0 20px;
        }
        .hero-content h1 {
            font-size: clamp(2rem, 4.2vw, 3.8rem);
            font-weight: 600;
            margin-bottom: .25rem;
            text-shadow: 0 6px 18px rgba(0,0,0,0.35);
        }
        .hero-content p.lead {
            font-size: 1.05rem;
            margin-bottom: 1rem;
            opacity: .95;
            text-shadow: 0 6px 18px rgba(0,0,0,0.25);
        }

        /* Why Choose Us */
        .why-header {
            background: #cfeadb; /* light green strip */
            padding: 1rem 0;
        }
        .why-header h2 {
            margin: 0;
            font-weight: 600;
        }
        .why-desc p {
            color: var(--muted);
            line-height: 1.6;
        }

        /* Cards / Tours */
        .card .card-img-top{
            height: 200px;
            object-fit: cover;
        }
        .tour-title {
            font-weight: 600;
            letter-spacing: .6px;
        }
        .tour-desc {
            font-size: .9rem;
            color: #333;
            min-height: 54px;
        }

        /* Rating dots like screenshot */
        .rating-dots {
            margin-top: 12px;
            display: flex;
            align-items: center;
            gap: .45rem;
        }
        .rating-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            background: #27d07a; /* bright green */
            border-radius: 999px;
            box-shadow: 0 1px 0 rgba(0,0,0,0.06);
        }
        .reviews-count {
            margin-left: .5rem;
            color: var(--muted);
            font-size: .9rem;
        }

        /* Travelers choice */
        .travelers-choice {
            background: #e6f6e9;
            padding: 2.4rem 1rem;
            border-radius: 6px;
        }
        .travelers-choice h4 {
            font-weight: 600;
        }

        /* Footer logo circle (if used) */
        .footer-logo-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        }

        /* Small helpers */
        .section-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* On hover card lift */
        .card:hover {
            transform: translateY(-6px);
            transition: transform .25s ease;
        }

        @media (max-width: 767px){
            .hero-section { height: 56vh; min-height: 380px; }
            .card .card-img-top { height: 160px; }
        }

    </style>
</head>
<body>

    <!-- ===== HERO ===== -->
    <section class="hero-section"
             style="background-image: url('{{ asset('images/hero-elephant.jpg') }}');">
        <div class="hero-overlay"></div>

        <div class="hero-content" data-aos="fade-up" data-aos-duration="900">
            <h1>Jeep Safari - Sri Lanka</h1>
            <p class="lead">Where The Place Freedom</p>
            <a href="#tours" class="btn btn-success btn-lg mt-2">Explore More</a>
        </div>
    </section>

    <!-- ===== WHY CHOOSE US  ===== -->
    <section class="why-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="ps-2 ps-md-0">Why Choose Us?</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7 why-desc" data-aos="fade-right">
                    <p>
                    Discover Sri Lanka’s untamed beauty with our expertly guided jeep safaris.  
                    We specialize in creating unforgettable wildlife adventures, taking you deep  
                    into the heart of national parks where elephants roam free, leopards stalk  
                    silently, and exotic birds paint the skies.
                    </p>

                    <p>
                    With comfortable, well-maintained jeeps, experienced local guides, and  
                    a passion for conservation, we ensure every journey is safe, exciting,  
                    and full of breathtaking moments. Whether you’re a photographer, a nature  
                    lover, or an adventurer at heart, our safaris are designed to give you  
                    a once-in-a-lifetime experience.
                </p>

                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <img src="{{ asset('images/jeep.jpg') }}" alt="Jeep" class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </section>

    <!-- WAYS TO TOUR -->
    <section id="tours" class="py-4">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up">
                <h3 class="section-title">Ways to tour</h3>
                <p class="text-muted">Book these experiences for a close-up look at Sri Lanka.</p>
            </div>

            <div class="row g-4">
                {{-- Card 1 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/yala.jpg') }}" class="card-img-top" alt="Yala">
                        <div class="card-body">
                            <h5 class="tour-title">YALA</h5>
                            <p class="tour-desc">Yala wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/udawalawe.jpg') }}" class="card-img-top" alt="Udawalawe">
                        <div class="card-body">
                            <h5 class="tour-title">UDAWALAWA</h5>
                            <p class="tour-desc">Udawalawe wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/kumana.jpg') }}" class="card-img-top" alt="Kumana">
                        <div class="card-body">
                            <h5 class="tour-title">KUMANA</h5>
                            <p class="tour-desc">Kumana wild animal watching tour from Sri Lanka</p>
                            <a href="{{ route('kumana') }}" class="btn btn-success">Explore</a>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/weheragala.jpg') }}" class="card-img-top" alt="Weheragala">
                        <div class="card-body">
                            <h5 class="tour-title">WEHERAGALA</h5>
                            <p class="tour-desc">Weheragala wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 5 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/minneriya.jpg') }}" class="card-img-top" alt="Minneriya">
                        <div class="card-body">
                            <h5 class="tour-title">MINNERIYA</h5>
                            <p class="tour-desc">Minneriya wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 6 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/eco-park.jpg') }}" class="card-img-top" alt="Eco Park">
                        <div class="card-body">
                            <h5 class="tour-title">ECO PARK</h5>
                            <p class="tour-desc">Eco Park wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 7 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/kawdulla.jpg') }}" class="card-img-top" alt="Kawdulla">
                        <div class="card-body">
                            <h5 class="tour-title">KAWDULLA</h5>
                            <p class="tour-desc">Kawdulla wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 8 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/wilpatthuwa.jpg') }}" class="card-img-top" alt="Wilpaththu">
                        <div class="card-body">
                            <h5 class="tour-title">WILPATHTHUWA</h5>
                            <p class="tour-desc">Wilpaththuwa wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 9 --}}
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/wasgamuwa.jpg') }}" class="card-img-top" alt="Wasgamuwa">
                        <div class="card-body">
                            <h5 class="tour-title">WASGAMUWA</h5>
                            <p class="tour-desc">Wasgamuwa wild animal watching tour from Sri Lanka</p>

                            <div class="rating-dots">
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span><span class="rating-dot"></span>
                                <span class="rating-dot"></span>
                                <span class="reviews-count">(44)</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> 
    </section>

    <!--TRAVELERS' CHOICE-->
    <section class="py-4">
        <div class="container">
            <div class="travelers-choice d-flex align-items-center justify-content-between flex-column flex-md-row" data-aos="fade-up">
                <div class="text-start mb-3 mb-md-0">
                    <h4><i class="fas fa-award text-warning me-2"></i> Travelers' Choice</h4>
                    <p class="mb-0">Safari Jeeps Best of the Best</p>
                </div>
                <div>
                    <a href="#" class="btn btn-success">See more</a>
                </div>
            </div>
        </div>
    </section>
    @endsection


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            mirror: false
        });
    </script>
</body>
</html>
