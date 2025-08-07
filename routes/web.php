<?php

use Illuminate\Support\Facades\Route;

//Front page
Route::get('/', function () {
    return view('welcome');
});
Route::post('/feedback', [FeedbackController::class, 'store']);

//Admin 
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
        return view('admin.home');
    });
});
