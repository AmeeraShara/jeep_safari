<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class ProfileController extends Controller
{


     public function index($customerId)
    {
        // Fetch the customer by ID
        $customer = Customer::findOrFail($customerId);

        return view('user.profile', compact('customer'));
    }
    // Show profile page
    public function show($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        return view('user.profile', compact('customer'));
    }

    // Update profile
    public function update(Request $request, $customerId)
   {
    $customer = Customer::findOrFail($customerId);

    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email',
        'phone'      => 'required',
        'dob'        => 'required|date',
        'emergency_name'   => 'required|string',
        'emergency_number' => 'required|string',
        'address'    => 'required|string',
    ]);

    $customer->update([
        'customer_name' => $request->first_name . ' ' . $request->last_name,
        'email' => $request->email,
        'phone_number' => $request->phone,
        'date_of_birth' => $request->dob,
        'emergency_contact_name' => $request->emergency_name,
        'emergency_contact_number' => $request->emergency_number,
        'address' => $request->address,
    ]);

    return redirect()->route('user.profile', $customerId)
                     ->with('success', 'Profile updated successfully.');
   }
}
