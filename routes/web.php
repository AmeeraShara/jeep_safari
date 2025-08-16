<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\BookingController;

//Front page
Route::get('/', function () {
    return view('main.home');
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

//Admin - User
Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit'); 
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update'); 
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy'); 
});

//Admin - Logout
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/', function () {
    return view('main.home'); 
})->name('main.home');

//Admin - settings
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
Route::post('/admin/settings/update', [SettingsController::class, 'update'])->name('admin.settings.update');

//Admin- Bookings
Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
Route::get('/admin/bookings/create', [BookingController::class, 'create'])->name('admin.bookings.create');
Route::post('/admin/bookings/store', [BookingController::class, 'store'])->name('admin.bookings.store');
Route::get('/admin/bookings/{id}/edit', [BookingController::class, 'edit'])->name('admin.bookings.edit');
Route::post('/admin/bookings/{id}/update', [BookingController::class, 'update'])->name('admin.bookings.update');
Route::delete('/admin/bookings/{id}/delete', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');



//Home page
Route::get('/home', function () {
    return view('main.home');
})->name('home');

//Place description and booking page
//Kumana
Route::get('/kumana', function () {
    return view('main.kumana');
})->name('kumana');

//yala
Route::get('/yala', function () {
    return view('main.yala');
})->name('yala');

//Udawalawa
Route::get('/udawalawa', function () {
    return view('main.udawalawa');
})->name('udawalawa');

//Weheragala
Route::get('/weheragala', function (){
    return view('main.weheragala');
})->name('weheragala');

//Minneriya
Route::get('/minneriya', function (){
    return view('main.minneriya');
})->name('minneriya');

//Eco park
Route::get('/eco-park', function (){
    return view('main.eco-park');
})->name('eco-park');

//Kawdulla
Route::get('/kawdulla', function (){
    return view('main.kawdulla');
})->name('kawdulla');

//wilpatthuwa
Route::get('/wilpatthuwa', function (){
    return view('main.wilpatthuwa');
})->name('wilpatthuwa');

//Wasgamuwa
Route::get('/wasgamuwa', function (){
    return view('main.wasgamuwa');
})->name('wasgamuwa');

//Admin - Driver
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('drivers', DriverController::class);
});

//Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
