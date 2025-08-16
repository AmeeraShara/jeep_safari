<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        // Example: get current admin info from session
        $adminId = session('admin_id');
        $admin = DB::table('admins')->where('id', $adminId)->first();

        return view('admin.settings.index', compact('admin'));
    }

    public function update(Request $request)
    {
        $adminId = session('admin_id');

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        // Update password only if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        DB::table('admins')->where('id', $adminId)->update($data);

        return redirect()->route('admin.settings')->with('success', ' updated successfully.');
    }
}
