@extends('layouts.app')

@section('content')
<style>
    :root{
        --brand-green: #28a745;
        --muted: #6c757d;
    }
    body { font-family: 'Poppins', sans-serif; color: #222; background: #fff; font-size: 14px; }

    /* HERO */
    .hero-section {
        position: relative;
        height: 70vh; min-height: 450px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), 
                    url('{{ asset('images/hero-elephant.jpg') }}');
        background-size: cover; background-position: center;
    }
    .hero-content { position: relative; z-index: 2; max-width: 900px; padding: 0 20px; }
    .hero-content h1 { font-size: 2.8rem; font-weight: 700; margin-bottom: 1rem; text-transform: uppercase; }
    .hero-content p.lead { font-size: 1.2rem; margin-bottom: 2rem; }

    /* Section headers */
    .section-header { text-align: center; margin: 3rem 0 2rem; }
    .section-header h2 { font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem; }
    .section-header p { color: var(--muted); }

    /* Destinations */
    .destination-card { background:white; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-bottom:2rem; }
    .destination-img { height:200px; width:100%; object-fit:cover; }
    .destination-content { padding:1.5rem; }
    .rating-dots { margin-top:12px; display:flex; align-items:center; gap:.45rem; }
    .rating-dot { width:10px; height:10px; background:#27d07a; border-radius:999px; }
    .reviews-count { margin-left:.5rem; color:var(--muted); font-size:.9rem; }

    /* Features */
    .feature-card { background:white; border-radius:8px; padding:1.5rem; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-bottom:2rem; height:100%; }
    .feature-icon { font-size:2.5rem; color:var(--brand-green); margin-bottom:1rem; }
</style>

<!-- ===== HERO ===== -->
<section class="hero-section">
    <div class="hero-content" data-aos="fade-up" data-aos-duration="900">
        <h1>Where to Safari in Sri Lanka?</h1>
        <p class="lead">Discover national parks and wildlife adventures across the island</p>
        <a href="#destinations" class="btn btn-success btn-lg mt-2">Explore More</a>
    </div>
</section>

<!-- ===== POPULAR DESTINATIONS ===== -->
<section id="destinations" class="destinations-section py-5">
    <div class="container">
        <div class="section-header">
            <h2>Popular Safari Destinations</h2>
            <p>Book your jeep safari in Sri Lanka’s most famous national parks.</p>
        </div>
        <div class="row">
            @php
                $parks = [
                    ['name'=>'YALA','img'=>'yala.jpg','route'=>'yala'],
                    ['name'=>'UDAWALAWE','img'=>'udawalawe.jpg','route'=>'udawalawa'],
                    ['name'=>'MINNERIYA','img'=>'minneriya.jpg','route'=>'minneriya'],
                    ['name'=>'KUMANA','img'=>'kumana.jpg','route'=>'kumana'],
                    ['name'=>'WASGAMUWA','img'=>'wasgamuwa.jpg','route'=>'wasgamuwa'],
                    ['name'=>'WILPATTU','img'=>'wilpatthuwa.jpg','route'=>'wilpatthuwa'],
                ];
            @endphp

            @foreach($parks as $park)
            <div class="col-md-4">
                <div class="destination-card">
                    <img src="{{ asset('images/'.$park['img']) }}" class="destination-img" alt="{{ $park['name'] }}">
                    <div class="destination-content">
                        <h4>{{ $park['name'] }}</h4>
                        <a href="{{ route($park['route']) }}" class="btn btn-success mt-2">Explore</a>
                        <div class="rating-dots mt-2">
                            <span class="rating-dot"></span><span class="rating-dot"></span>
                            <span class="rating-dot"></span><span class="rating-dot"></span>
                            <span class="rating-dot"></span>
                            <span class="reviews-count">(44)</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== WHY CHOOSE US ===== -->
<section class="why-choose-section py-5 bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Us</h2>
        </div>
        <div class="row">
            <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-star"></i></div><h5>Expert Guides</h5><p>Local guides with deep knowledge of wildlife and parks.</p></div></div>
            <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-car"></i></div><h5>Comfortable Jeeps</h5><p>Safe, well-maintained jeeps for an enjoyable journey.</p></div></div>
            <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="fas fa-award"></i></div><h5>Trusted Experience</h5><p>Thousands of travelers choose us every year.</p></div></div>
        </div>
    </div>
</section>

<!-- ===== NEWSLETTER ===== -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h4>JOIN OUR NEWSLETTER</h4>
        <p>Get exclusive safari offers and travel inspiration straight to your inbox.</p>
        <div class="input-group mb-3 w-50 mx-auto">
            <input type="email" class="form-control" placeholder="Enter your email">
            <button class="btn btn-success" type="button">Subscribe</button>
        </div>
    </div>
</section>
@endsection
