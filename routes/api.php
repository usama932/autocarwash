<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ServiceController;


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
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('services',[ServiceController::class, 'index']);
    Route::post('store_services',[ServiceController::class, 'store']);
    Route::post('update_services/{id}',[ServiceController::class, 'update']);
    Route::post('delete_services/{id}',[ServiceController::class, 'delete']);
    
});
