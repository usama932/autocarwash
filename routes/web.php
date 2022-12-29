<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ServiceController;
use App\Http\Controllers\frontend\TeamController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\VehicleController;
use App\Http\Controllers\frontend\CustomerController;
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

Auth::routes();
Route::group(['middleware' => ['admin']], function () {
    Route::resource('services', ServiceController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('customers', CustomerController::class);
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

