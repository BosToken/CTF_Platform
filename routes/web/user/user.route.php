<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class, 'profile'])->name('user-profile');
Route::get('challenge', [UserController::class, 'challenge'])->name('challenge');
Route::get('scoreboard', [UserController::class, 'scoreboard'])->name('scoreboard');

// Route::post('flagSubmit/{challenge_id}', [UserController::class, 'submitFlag'])->name('submitFlag');
Route::post('submitFlag/{id}', [UserController::class, 'submitFlag'])->name('flag.submit');