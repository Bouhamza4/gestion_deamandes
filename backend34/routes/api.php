<?php

// use App\Http\Controllers\DemandeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
Route::post('/register', [AuthController::class, 'register']);
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/test', function () {
    return response()->json(['message' => 'test']);
});


Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'email_verified_at' => now(),
            'password' => bcrypt(uniqid()), // mot de passe temporaire
            'role' => 'citoyen' // 🟩 automatiquement citoyen
        ]
    );

    Auth::login($user);
    return redirect('/dashboard');
});

// Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index']);
// });

// Route::middleware(['auth:sanctum', 'role:citoyen'])->group(function () {
//     Route::get('/citoyen/dashboard', [CitoyenController::class, 'index']);
// });


Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::get('/demandes', 'DemandeController@index');
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return response()->json(['message' => 'E-mail vérifié avec succès']);
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

