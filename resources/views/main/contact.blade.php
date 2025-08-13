@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section position-relative text-center text-white"
     style="background:url('{{ asset('images/contact-banner.jpg') }}') center/cover no-repeat; height: 450px;">
    
    <!-- Dark Overlay -->
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.5);"></div>
    
    <!-- Content -->
    <div class="position-relative d-flex flex-column align-items-center justify-content-center h-100" data-aos="fade-down">
        <h1 class="fw-bold" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.8);">Contact Us</h1>
        <p class="lead" style="text-shadow: 1px 1px 6px rgba(0,0,0,0.7);">
            Get in touch with our team to plan your jeep safari
        </p>
    </div>
</div>

<!-- Contact Info & Form -->
<div class="container my-5">
    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-md-6" data-aos="fade-right">
            <h4 class="mb-3">Get In Touch</h4>
            <p>Have questions about our safari tours or want to make a booking? Contact us using the information below or fill out the form.</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-geo-alt-fill text-success"></i> 123 Safari Road, Colombo, Sri Lanka</li>
                <li class="mb-2"><i class="bi bi-telephone-fill text-success"></i> +94 123 456 789</li>
                <li class="mb-2"><i class="bi bi-envelope-fill text-success"></i> info@jeepsafari.com</li>
            </ul>
            <p><strong>Business Hours:</strong><br>
                Monday - Friday: 8:00 AM - 6:00 PM<br>
                Saturday: 9:00 AM - 5:00 PM<br>
                Sunday: 9:00 AM - 3:00 PM
            </p>
        </div>

        <!-- Right Column (Form) -->
        <div class="col-md-6" data-aos="fade-left">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-white">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Map Section -->
    <div class="my-5 text-center">
        <h4>Find Us</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18..."
                width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
    </div>

</div>
@endsection
