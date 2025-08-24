<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login page
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    // Handle login submit
    public function login(Request $request, $role)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect by role
            if ($role === 'admin') {
                return redirect()->route('admin.home')->with('success', 'Welcome back, Admin!');
            } elseif ($role === 'driver') {
                return redirect()->route('driver.home')->with('success', 'Welcome back, Driver!');
            } else {
                return redirect()->route('user.home')->with('success', 'Welcome back!');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
