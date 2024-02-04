<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class, 'profile'])->name('user-profile');
Route::get('challenges', [UserController::class, 'challenge'])->name('challenges');
Route::get('scoreboard', [UserController::class, 'scoreboard'])->name('scoreboard');

// Route::post('flagSubmit/{challenge_id}', [UserController::class, 'submitFlag'])->name('submitFlag');
Route::post('submitFlag/{id}', [UserController::class, 'submitFlag'])->name('flag.submit');