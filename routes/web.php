<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;

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
