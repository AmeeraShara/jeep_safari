<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /** Show combined login form */
    public function showLoginForm() {
        return view('auth.login'); // your tabbed login.blade.php
    }

    /** Show combined register form */
    public function showRegisterForm() {
        return view('auth.register'); // your tabbed register.blade.php
    }

    /** Handle registration for all roles */
    public function register(Request $request, $role) {
        switch ($role) {
            case 'customer':
                $request->validate([
                    'customer_name' => 'required|string|max:255',
                    'email' => 'required|email|unique:customers',
                    'password' => 'required|confirmed|min:6',
                ]);

                Customer::create([
                    'customer_name' => $request->customer_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                break;

            case 'driver':
                $request->validate([
                    'full_name' => 'required|string|max:255',
                    'email' => 'required|email|unique:drivers',
                    'phone_number' => 'required',
                    'license_number' => 'required|unique:drivers',
                    'years_of_experience' => 'required|integer|min:0',
                    'password' => 'required|confirmed|min:6',
                ]);

                Driver::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'license_number' => $request->license_number,
                    'years_of_experience' => $request->years_of_experience,
                    'joined_date' => now(),
                    'primary_park' => 'Yala',
                    'vehicle' => 'Unknown',
                    'language' => 'English',
                    'password' => Hash::make($request->password),
                ]);
                break;

            case 'admin':
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:admins',
                    'password' => 'required|confirmed|min:6',
                ]);

                Admin::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                break;
        }

        return redirect()->route('login')->with('success', ucfirst($role).' account created! Please login.');
    }

    /** Handle login for all roles */
    public function login(Request $request, $role) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $model = match($role) {
            'customer' => Customer::class,
            'driver'   => Driver::class,
            'admin'    => Admin::class,
            default    => null
        };

        if (!$model) {
            return back()->withErrors(['email' => 'Invalid role']);
        }

        $user = $model::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([$role.'_id' => $user->id]);

            // Role-based redirect
            if ($role === 'admin') {
                return redirect()->route('admin.home');
            } elseif ($role === 'driver') {
                return redirect()->route('driver.dashboard');
            } else {
                return redirect()->route('user.dashboard'); // customer
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    /** Logout */
    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
