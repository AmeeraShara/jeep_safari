<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
public function index(Request $request)
{
    $query = Driver::query();

    // Search by name or email
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('full_name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    // Filter by park
    if ($request->filled('primary_park')) {
        $query->where('primary_park', $request->primary_park);
    }

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $drivers = $query->latest()->get();

    // For dropdown options (unique parks list)
    $parks = Driver::select('primary_park')->distinct()->pluck('primary_park');

    return view('admin.drivers.index', compact('drivers', 'parks'));
}


    public function create()
    {
        return view('admin.drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:drivers',
            'phone_number' => 'required|string',
            'years_of_experience' => 'required|integer|min:0',
            'password' => 'required|min:6|confirmed',
            'joined_date' => 'required|date',
            'primary_park' => 'required|string',
            'license_number' => 'required|string',
            'vehicle' => 'required|string',
            'language' => 'required|string',
            'status' => 'required'
        ]);

        Driver::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'years_of_experience' => $request->years_of_experience,
            'password' => Hash::make($request->password),
            'joined_date' => $request->joined_date,
            'primary_park' => $request->primary_park,
            'license_number' => $request->license_number,
            'vehicle' => $request->vehicle,
            'language' => $request->language,
            'status' => $request->status
        ]);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver added successfully.');
    }
}

