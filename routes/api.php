<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\TeamController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\VehicleController;
use App\Http\Controllers\api\BookingsReportController;
use App\Http\Controllers\api\BookingController;
use App\Http\Controllers\api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [HomeController::class, 'login']);
Route::post('/signup', [HomeController::class, 'sign_up']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['middleware' => ['admin']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Services
    Route::get('services',[ServiceController::class, 'index']);
    Route::post('store_services',[ServiceController::class, 'store']);
    Route::post('update_services/{id}',[ServiceController::class, 'update']);
    Route::post('delete_services/{id}',[ServiceController::class, 'delete']);
    // Teams
    Route::get('teams',[TeamController::class, 'index']);
    Route::post('store_teams',[TeamController::class, 'store']);
    Route::post('update_teams/{id}',[TeamController::class, 'update']);
    Route::post('delete_teams/{id}',[TeamController::class, 'delete']);
    // Customer
    Route::get('customers',[CustomerController::class, 'index']);
    Route::post('store_customers',[CustomerController::class, 'store']);
    Route::post('update_customers/{id}',[CustomerController::class, 'update']);
    Route::post('delete_customers/{id}',[CustomerController::class, 'delete']);

    // Vehicle
    Route::get('vehicles',[VehicleController::class, 'index']);
    Route::post('store_vehicles',[VehicleController::class, 'store']);
    Route::post('update_vehicles/{id}',[VehicleController::class, 'update']);
    Route::post('delete_vehicles/{id}',[VehicleController::class, 'delete']);

    // Bookings
    Route::get('bookings',[BookingsReportController::class, 'index']);
    Route::post('store_bookings',[BookingsReportController::class, 'store']);
    Route::post('update_bookings/{id}',[BookingsReportController::class, 'update']);
    Route::post('delete_bookings/{id}',[BookingsReportController::class, 'delete']);
});
    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/update-profile', [ProfileController::class, 'update_profile']);
    Route::group(['middleware' => ['user']], function () {
        Route::get('user_bookings',[BookingController::class, 'index']);
        Route::post('user_store_bookings',[BookingController::class, 'store']);
        Route::get('vehicles',[VehicleController::class, 'index']);
        Route::get('services',[ServiceController::class, 'index']);
       
    }); 
});
