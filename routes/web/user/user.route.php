<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;



Route::middleware(['auth'])->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('user-profile');
    Route::get('challenges', [UserController::class, 'challenge'])->name('challenges');
    Route::get('scoreboard', [UserController::class, 'scoreboard'])->name('scoreboard');
    Route::post('submitFlag/{id}', [UserController::class, 'submitFlag'])->name('flag.submit');
    Route::get('profile', [UserController::class, 'profile'])->name('user-profile');
    Route::get('users', [Controller::class, 'users'])->name('users');
    Route::get('user/{username}', [Controller::class, 'getUser'])->name('user-detail');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});