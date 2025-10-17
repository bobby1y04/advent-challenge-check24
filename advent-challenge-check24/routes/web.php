<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;

// +++ Login / Logout +++
Route::view('/join', 'join')->name('join');
Route::post('/join', [AuthController::class, 'join'])->name('join.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// +++ Middleware-Routes +++
Route::middleware('auth.session')->group(function() {
    Route::view('/lobby', 'lobby')->name('lobby');

    // +++ Challenge-Routes +++
    Route::get('/challenge/{slug}', [ChallengeController::class, 'show'])->name('challenge.show');
    Route::post('challenge/{slug}/submit', [ChallengeController::class, 'submit'])->name('challenge.submit');
});



