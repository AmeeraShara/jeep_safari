<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

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

//User
Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy'); 
});

//Home page
Route::get('/home', function () {
    return view('main.home');
})->name('home');
