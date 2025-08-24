<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        // Get the currently logged-in admin
        // Use Auth::user() since no custom guard
        $admin = Auth::user(); 

        // Fallback if still using session
        if (!$admin) {
            $adminId = session('admin_id');
            $admin = DB::table('admins')->where('id', $adminId)->first();
        }

        return view('admin.settings.index', compact('admin'));
    }

    public function update(Request $request)
    {
        // Get logged-in admin
        $admin = Auth::user(); 

        // Fallback if still using session
        if (!$admin) {
            $adminId = session('admin_id');
            $admin = DB::table('admins')->where('id', $adminId)->first();
        }

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6|confirmed'
        ]);

        $data = [
            'name'  => $request->input('name'),
            'email' => $request->input('email')
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        // Update the admin
        DB::table('admins')->where('id', $admin->id)->update($data);

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }
}
