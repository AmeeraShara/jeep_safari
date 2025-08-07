<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get(); 
        return view('admin.dashboard', compact('customers'));
    }
}
