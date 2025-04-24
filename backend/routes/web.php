<?php

use App\Http\Controllers\ControllerPosts;
use App\Http\Controllers\ControllerPostsFB;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::resource('Posts1s',ControllerPosts::class);
// Route::resource('PostsFB',ControllerPostsFB::class);
// Route::post('/postsFB/{slug}/comment', [App\Http\Controllers\ControllerPostsFB::class, 'comment'])->name('PostsFB.comment');

Route::prefix('amin')->group(function(){
    Route::get('/application',function(){
        return "la page application";
    });
    Route::get('/dashboard',function(){
        return view("dashboard");
    });


});

require __DIR__.'/auth.php';
