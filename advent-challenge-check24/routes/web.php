<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/join', 'join')->name('join');
Route::post('/join', [AuthController::class, 'join'])->name('join.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.session')->group(function() {
    Route::view('/lobby', 'lobby')->name('lobby');
});
