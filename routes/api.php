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
use App\Http\Controllers\api\ReviewController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\NotificationSendController;
use App\Http\Controllers\api\CheckController;
use App\Http\Controllers\api\PasswordController;




Route::post('login', [HomeController::class, 'login']);
Route::post('/signup', [HomeController::class, 'sign_up']);

Route::post('forgot-password', [PasswordController::class, 'forgotPassword']);
Route::post('reset-password', [PasswordController::class, 'reset']);

Route::group(['middleware' => ['auth:sanctum']], function () {
   
    Route::group(['middleware' => ['admin']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('dashboard_data',[HomeController::class, 'dashboard']);
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
    //Employee
    Route::get('employees',[EmployeeController::class, 'index']);
    Route::post('store_employees',[EmployeeController::class, 'store']);
    Route::post('update_employees/{id}',[EmployeeController::class, 'update']);
    Route::post('delete_employees/{id}',[EmployeeController::class, 'destroy']);
    //Review
    Route::get('reviews',[ReviewController::class, 'index']);
    Route::post('update_reviews/{id}',[ReviewController::class, 'update']);
    Route::post('delete_reviews/{id}',[ReviewController::class, 'destroy']);
    //push Notifiation
    Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification']);
    //atttendenece
    Route::get('sheetreport', [CheckController::class, 'sheetReport']);
    Route::post('check_store',[CheckController::class, 'newAttandance']);
    Route::post('check_update',[CheckController::class, 'updateAttandance']);
});
    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/update_profile', [ProfileController::class, 'update_profile']);
    Route::post('/user_update_profile', [ProfileController::class, 'update_profile']);
    Route::group(['middleware' => ['user']], function () {
        Route::get('user_bookings',[BookingController::class, 'index']);
        Route::post('user_store_bookings',[BookingController::class, 'store']);
        Route::get('user_vehicles',[VehicleController::class, 'index']);
        Route::get('user_services',[ServiceController::class, 'index']);
        Route::post('store_reviews',[ReviewController::class, 'store']);
        Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken']);
        Route::get('reward',[HomeController::class, 'reward']);
    }); 
});
