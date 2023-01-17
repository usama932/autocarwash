<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ServiceController;
use App\Http\Controllers\frontend\TeamController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\BookingsReportController;
use App\Http\Controllers\frontend\VehicleController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\frontend\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' ,[HomeController::class, 'index'] )->name('home');
Route::get('/about' ,[HomeController::class, 'about'] )->name('about');
Route::get('/service' ,[HomeController::class, 'service'] )->name('service');
Route::get('/contact' ,[HomeController::class, 'contact'] )->name('contact');
Route::post('/web-login' ,[HomeController::class, 'web_login'] )->name('web.login');
Route::post('/front-login' ,[HomeController::class, 'front_login'] )->name('front.login');

Auth::routes();
// Admin
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::group(['middleware' => ['admin']], function () {
   
    Route::resource('services', ServiceController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('bookings', BookingsReportController::class);
    Route::resource('reviews', ReviewController::class);
    Route::get('/admin-profile', [ProfileController::class, 'index'])->name('admin_profile');
    Route::post('/update-admin-profile', [ProfileController::class, 'update_profile'])->name('admin_profile.update');
});
// User
Route::group(['middleware' => ['user']], function () {
   
    Route::resource('user_booking', BookingController::class);
    Route::resource('reviews', ReviewController::class);

    Route::get('/user-profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update-user-profile', [ProfileController::class, 'update_profile'])->name('profile.update');
});


