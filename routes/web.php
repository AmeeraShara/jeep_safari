<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('test');
});

//Admin 
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
        return view('admin.home');
    });
});
