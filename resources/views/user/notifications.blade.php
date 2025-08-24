@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        @include('layouts.user')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-4">Notifications</h4>
                    
                    <!-- Recent Notifications -->
                    <div class="mb-4">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-success me-2"><i class="bi bi-check-circle"></i></span>
                                    <strong>Booking Confirmed</strong><br>
                                    <small>Your Yala National Park safari has been confirmed for August 15, 2023.</small><br>
                                    <span class="text-muted small">2 hours ago</span>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-success me-1"><i class="bi bi-check"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-warning me-2"><i class="bi bi-exclamation-triangle"></i></span>
                                    <strong>Payment Reminder</strong><br>
                                    <small>Payment for Wilpattu National Park safari is due in 3 days.</small><br>
                                    <span class="text-muted small">1 day ago</span>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-success me-1"><i class="bi bi-check"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-info me-2"><i class="bi bi-info-circle"></i></span>
                                    <strong>New Safari Package Available</strong><br>
                                    <small>Check out our new Kumana Bird Watching safari experience!</small><br>
                                    <span class="text-muted small">3 days ago</span>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-primary me-2"><i class="bi bi-star"></i></span>
                                    <strong>Reward Points Earned</strong><br>
                                    <small>You have earned 50 reward points from your recent safari booking.</small><br>
                                    <span class="text-muted small">1 week ago</span>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <strong>Notification Settings</strong>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">Sms Notifications</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                    <label class="form-check-label" for="pushNotifications">Push Notifications</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="bookingReminders" checked>
                                    <label class="form-check-label" for="bookingReminders">Booking Reminders</label>
                                </div>
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input" type="checkbox" id="promoOffers">
                                    <label class="form-check-label" for="promoOffers">Promotional Offers</label>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Save Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.col main content -->

    </div>
</div>
@endsection
