<?php

use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\WebGraphController;

use App\Models\Mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('destination', [LocationController::class, 'index']);

Route::apiResource('users', UserController::class);

Route::post('/bookings', [BookingApiController::class, 'createBooking']);
Route::get('/total-users', [UserController::class, 'getTotalUsers']);
Route::get('/total-bookings', [BookingApiController::class, 'getTotalBookings']);
Route::get('/total-locations', [LocationController::class, 'getTotalLocations']);
Route::get('/recent-bookings', [BookingApiController::class, 'getRecentBookings']);
Route::get('/users-and-bookings-by-month', [WebGraphController::class, 'getUsersAndBookingsByMonth']);


Route::post('/register', [MobileController::class, 'register']);
Route::post('/login', [MobileController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [MobileController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-profile', [MobileController::class, 'update']);

