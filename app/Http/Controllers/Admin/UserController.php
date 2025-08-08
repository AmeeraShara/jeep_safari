<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Filter by role if provided, else default to 'customer'
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        } else {
            $query->where('role', 'customer');
        }

        // Filter by status if provided
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Paginate with 10 per page, keep query string for filters in pagination links
        $users = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.users.show', ['customers' => $customer]);
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

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.users.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'nationality' => 'required|string',
            'passport_number' => 'nullable|string|unique:customers,passport_number,' . $id,
            'emergency_contact_name' => 'required|string',
            'emergency_contact_number' => 'required|string',
            'special_preference_notes' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        $customer->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = Customer::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
