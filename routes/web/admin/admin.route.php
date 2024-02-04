<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get('challenges', [AdminController::class, 'challenges'])->name('admin-challenges');
    Route::get('categories', [AdminController::class, 'categories'])->name('admin-categories');

    Route::get('challenge/new', [AdminController::class, 'createChallenge'])->name('admin-create-challenge');
    Route::get('category/new', [AdminController::class, 'createCategory'])->name('admin-create-category');

    Route::post('challenge/store', [AdminController::class, 'storeChallenge'])->name('admin-store-challenge');
    Route::post('category/store', [AdminController::class, 'storeCategory'])->name('admin-store-category');

    Route::get('challenges/detail/{id}', [AdminController::class, 'detailChallenge'])->name('admin-challenge-detail');
    Route::get('category/detail/{id}', [AdminController::class, 'detailCategory'])->name('admin-category-detail');

    Route::post('challenge/update/{id}', [AdminController::class, 'updateChallenge'])->name('admin-challenge-update');
    Route::post('category/update/{id}', [AdminController::class, 'updateCategory'])->name('admin-category-update');

    Route::get('challenge/delete/{id}', [AdminController::class, 'deleteChallenge'])->name('admin-challenge-delete');
    Route::get('category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin-category-delete');
});
