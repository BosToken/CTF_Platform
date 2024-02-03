<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/web/user/user.route.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function(){
    return view('login');
});


Route::get('profile', [UserController::class, 'profile'])->name('user-profile');

Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);