<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\LogoutController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\AuthController;

// ✅ Auth routes (register / login / logout)
// use App\Http\Controllers\AuthController;
// use Illuminate\Support\Facades\Route;
//test
Route::get("/test", function (){
    return "amin vvvvvvvvvvvvvv";
});


Route::middleware('guest')->post('/register', [AuthController::class, 'register']);
Route::middleware('guest')->post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->get('/reservations', [ReservationController::class, 'index']);

// routes/api.php
Route::middleware('guest')->group(function () {
    Route::post('/reservations', [ReservationController::class, 'store']);
});


// ✅ Reservations (protected)
// Route::middleware('auth:sanctum')->group(function () {
   
//     Route::get('/reservations/{id}', [ReservationController::class, 'show']);
//     Route::put('/reservations/{id}', [ReservationController::class, 'update']);
//     Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
// });

// ✅ Messages (protected)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/messages', [MessageController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'store']);
});
