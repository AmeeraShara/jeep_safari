<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Driver;

class DashboardController extends Controller
{
    public function index()
    {
        
         $activeDrivers = Driver::where('status', 'Active')->count();

        return view('admin.home', compact('activeDrivers'));
    }
}
