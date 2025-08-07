<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get(); // load all customers
        return view('admin.dashboard', compact('customers'));
    }
}
