<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Later you can fetch from DB
        $notifications = [
            (object) ['title' => 'Booking Confirmed', 'message' => 'Your safari has been confirmed.', 'created_at' => now()->subHours(2)],
            (object) ['title' => 'Payment Reminder', 'message' => 'Your payment is due in 3 days.', 'created_at' => now()->subDay()],
            (object) ['title' => 'New Package Available', 'message' => 'Check out our new bird watching safari.', 'created_at' => now()->subDays(3)],
        ];

        return view('user.notifications', compact('notifications'));
    }
}
