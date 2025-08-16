<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        // Clear admin session
        $request->session()->forget(['admin_logged_in', 'admin_id']);

        // Redirect to main.home route
        return redirect()->route('main.home');
    }
}
