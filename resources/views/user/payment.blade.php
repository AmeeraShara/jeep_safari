@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        @include('layouts.user')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Payment Methods</h3>
                <button id="showFormBtn" class="btn btn-success">
                    <i class="bi bi-plus-lg me-1"></i> Add Payment Method
                </button>
            </div>

            <!-- Payment method cards -->
            <div class="row g-3 mb-4" id="paymentCards">
                @foreach($paymentMethods as $payment)
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-credit-card me-2" style="font-size: 1.5rem;"></i>
                                    <strong>{{ $payment->cardholder_name }}</strong> •••• {{ substr($payment->card_number, -4) }}<br>
                                    <small class="text-muted">Expires {{ $payment->expiry_month }}/{{ $payment->expiry_year }}</small><br>
                                    @if($payment->is_default)
                                        <span class="badge bg-success mt-1">Default</span>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <!-- Delete Button -->
                                    <form action="{{ route('user.payment.destroy', [$customer->id, $payment->id]) }}" method="POST" class="me-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <!-- Set Default -->
                                    @if(!$payment->is_default)
                                        <form action="{{ route('user.payment.setDefault', [$customer->id, $payment->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success btn-sm">
                                                Set Default
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Add New Payment Method Form -->
            <div class="card shadow-sm mb-4" id="paymentFormCard" style="display: none;">
                <div class="card-body">
                    <h5 class="mb-3">Add New Payment Method</h5>
                    <form id="paymentForm" action="{{ route('user.payment.store', $customer->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cardholderName" class="form-label">Cardholder Name</label>
                            <input type="text" name="cardholder_name" class="form-control" id="cardholderName" placeholder="Name on Card" required>
                        </div>
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" name="card_number" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label for="expiryMonth" class="form-label">Month</label>
                                <select id="expiryMonth" name="expiry_month" class="form-select" required>
                                    <option selected disabled>MM</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ sprintf('%02d', $m) }}">{{ sprintf('%02d', $m) }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="expiryYear" class="form-label">Year</label>
                                <select id="expiryYear" name="expiry_year" class="form-select" required>
                                    <option selected disabled>YYYY</option>
                                    @php $year = date('Y'); @endphp
                                    @for ($y = $year; $y <= $year + 10; $y++)
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" name="cvv" class="form-control" id="cvv" placeholder="123" maxlength="4" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success me-2">Add Card</button>
                        <button type="button" class="btn btn-secondary" id="cancelFormBtn">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const showFormBtn = document.getElementById('showFormBtn');
    const cancelFormBtn = document.getElementById('cancelFormBtn');
    const paymentFormCard = document.getElementById('paymentFormCard');

    // Show the form
    showFormBtn.addEventListener('click', () => {
        paymentFormCard.style.display = 'block';
        showFormBtn.style.display = 'none';
    });

    // Cancel button
    cancelFormBtn.addEventListener('click', () => {
        paymentFormCard.style.display = 'none';
        showFormBtn.style.display = 'inline-block';
    });
</script>
@endsection
