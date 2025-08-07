<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

//Front page
Route::get('/', function () {
    return view('welcome');
});
Route::post('/feedback', [FeedbackController::class, 'store']);

use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
        return view('admin.home'); // dashboard page
    });

    Route::get('/users', function () {
        return view('admin.users'); // user management page
    });
});

Route::get('/users', function () {
    return view('admin.manage'); // even though URL is /users, file is not
});
