<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'landing'])->name('welcome');

Route::get('users', [GuestController::class, 'users'])->name('users');
Route::get('user/{username}', [GuestController::class, 'getUser'])->name('user-detail');

Route::get('/login', [GuestController::class, 'login_view'])->name('login');
Route::post('/login', [GuestController::class, 'login']);

Route::get('/scoreboard', [GuestController::class, 'scoreboard'])->name('scoreboard');