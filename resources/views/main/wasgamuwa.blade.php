@extends('layouts.app') {{-- Main layout with navbar/footer --}}

@section('content')
<style>
    /* Hero section */
    .hero-section {
        position: relative;
        height: 60vh;
        background: url('{{ asset('images/hero-elephant.jpg') }}') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hero-section h1 {
        color: white;
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        animation: fadeInDown 1s ease-in-out;
    }
    @keyframes fadeInDown {
        from {opacity: 0; transform: translateY(-20px);}
        to {opacity: 1; transform: translateY(0);}
    }

    /* Booking box */
    .booking-box {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        animation: fadeIn 1.2s ease-in-out;
    }
    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    /* Review cards */
    .review-card {
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .review-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <h1>WASGAMUWA NATIONAL PARK</h1>
</div>

<!-- Content -->
<div class="container my-5">
    <h2 class="mb-4">Wasgamuwa National Park and Safari</h2>
    <div class="row g-4">
        
        <!-- Left Column -->
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/wasgamuwa-ele.jpg') }}" class="img-fluid rounded shadow" alt="Wasgamuwa Safari">
                </div>
                <div class="col-md-6">
                    <p><strong>Tour Start:</strong> 2.00 PM</p>
                    <p><strong>Meeting Point:</strong> Hotels in Polonnaruwa / Habarana</p>
                    <p>Free Pick up & Drop off from Polonnaruwa or Habarana</p>
                    <p><strong>Vehicle:</strong> Safari Jeep</p>
                    <p><strong>Duration:</strong> 4–5 Hours</p>
                </div>
            </div>

            <div class="mt-4">
                <h4>Description</h4>
                <p>
                    Experience the wilderness of Wasgamuwa National Park, known for its large herds of wild elephants, sloth bears, and diverse bird species. 
                    Located in Sri Lanka’s dry zone, Wasgamuwa offers a truly untamed safari adventure with fewer crowds and more intimate wildlife encounters.
                </p>
                <ul>
                    <li>Private Safari Jeep</li>
                    <li>Experienced Driver/Guide</li>
                    <li>Entrance & Service Fees + Park VAT Tax</li>
                    <li>Free Hotel Pickup & Drop off (Polonnaruwa/Habarana)</li>
                    <li>Binoculars available upon request</li>
                </ul>
            </div>
        </div>

        <!-- Right Column (Booking Form) -->
        <div class="col-lg-4">
            <div class="booking-box">
                <h5 class="text-success mb-3">Get A Free Quote & Book Online</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Safari for Adult</label>
                        <input type="number" class="form-control" placeholder="Number of Adults">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Safari for Child</label>
                        <input type="number" class="form-control" placeholder="Number of Children">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hotel Pickup / Drop (Optional)</label>
                        <input type="text" class="form-control" placeholder="Enter hotel name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" class="form-control" value="Rs" readonly>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Book Now</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-5">
        <h4>Jeep Driver Reviews</h4>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Sunil</strong> <span class="text-success">4.9 ★</span>
            <p class="mb-1"><small>2024-11-02</small></p>
            <p>"Saw a herd of over 150 elephants, plus a rare sloth bear. Absolutely amazing!"</p>
        </div>
        <div class="review-card border p-3 mb-3">
            <strong>Mr. Ruwan</strong> <span class="text-success">4.8 ★</span>
            <p class="mb-1"><small>2024-10-15</small></p>
            <p>"Less crowded than other parks — felt like a private safari."</p>
        </div>
        <div class="review-card border p-3">
            <strong>Mr. Kasun</strong> <span class="text-warning">4.6 ★</span>
            <p class="mb-1"><small>2024-09-05</small></p>
            <p>"Knowledgeable driver and beautiful landscapes. Great experience!"</p>
        </div>
    </div>
</div>
@endsection
