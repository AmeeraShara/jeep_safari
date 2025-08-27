<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\PaymentMethodController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Controllers\Review\PlaceController;



// Login & Registration
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login/{role}', [RegisterController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register/{role}', [RegisterController::class, 'register']);
Route::match(['get','post'], '/admin/home', [DashboardController::class, 'index'])->name('admin.home');

// Dashboards
Route::get('/admin/home', function () {
    return view('admin.home'); 
})->name('admin.home');

Route::get('/driver/dashboard', function () {
    return view('driver.dashboard'); // create this blade
})->name('driver.dashboard');

Route::get('/user/dashboard', function () {
    return view('user.dashboard'); // create this blade
})->name('user.dashboard');

// Logout
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');



//Front page
Route::get('/', function () {
    return view('main.home');
});
Route::post('/feedback', [FeedbackController::class, 'store']);

//Admin 
//Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.home');

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
Route::put('/admin/bookings/{id}/update', [BookingController::class, 'update'])->name('admin.bookings.update');
Route::delete('/admin/bookings/{id}/delete', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');

//Admin - Driver
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('drivers', [DriverController::class, 'index'])->name('drivers.index');      
    Route::get('drivers/create', [DriverController::class, 'create'])->name('drivers.create'); 
    Route::post('drivers', [DriverController::class, 'store'])->name('drivers.store');       
    Route::get('drivers/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');  
    Route::put('drivers/{driver}', [DriverController::class, 'update'])->name('drivers.update'); 
    Route::delete('drivers/{driver}', [DriverController::class, 'destroy'])->name('drivers.destroy');
});
Route::patch('admin/drivers/{driver}/deactivate', [DriverController::class, 'deactivate'])->name('admin.drivers.deactivate');

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


//Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//user pages
Route::prefix('user')->name('user.')->group(function () {

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    Route::get('/profile/{customerId}', [ProfileController::class, 'index'])->name('user.profile');

     // Show profile page
    Route::get('/profile/{customerId}', [ProfileController::class, 'show'])->name('profile');

    // Update profile
    Route::post('/profile/{customerId}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/bookings', function () {
        return view('user.bookings');
    })->name('bookings');

    // Payment Methods
    Route::get('/payment/{customer}', [PaymentMethodController::class, 'index'])->name('payment');
    Route::post('/payment/{customer}', [PaymentMethodController::class, 'store'])->name('payment.store');
    Route::delete('/payment/{customer}/destroy/{payment}', [PaymentMethodController::class, 'destroy'])->name('payment.destroy');
    Route::post('/payment/{customer}/set-default/{payment}', [PaymentMethodController::class, 'setDefault'])
     ->name('payment.setDefault');

     Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});


//Review 
Route::prefix('review')->group(function () {
    Route::get('/', [ReviewController::class,'index'])->name('review.index');
    Route::get('/create', [ReviewController::class,'create'])->name('review.create');
    Route::post('/store', [ReviewController::class,'store'])->name('review.store');
    Route::get('/search-place', [ReviewController::class,'searchPlace'])->name('review.searchPlace');
});
//Places
Route::get('/places/create', [PlaceController::class, 'create'])->name('places.create');
Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
