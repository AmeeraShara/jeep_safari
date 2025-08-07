<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = Customer::where('role', 'customer')->get();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = Customer::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'nationality' => 'required|string',
            'passport_number' => 'nullable|string|unique:customers,passport_number',
            'emergency_contact_name' => 'required|string',
            'emergency_contact_number' => 'required|string',
            'special_preference_notes' => 'nullable|string',
        ]);

        $validated['password'] = Hash::make('Default@123'); // Default password
        $validated['role'] = 'customer';
        $validated['status'] = 'active';

        Customer::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
    }

    public function destroy($id)
    {
        $user = Customer::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
