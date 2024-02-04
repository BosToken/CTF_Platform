<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get('challenges', [AdminController::class, 'challenges'])->name('admin-challenges');
    Route::get('categories', [AdminController::class, 'categories'])->name('admin-categories');
    Route::get('informations', [AdminController::class, 'informations'])->name('admin-informations');
    Route::get('users', [AdminController::class, 'users'])->name('admin-users');
    Route::get('teams', [AdminController::class, 'teams'])->name('admin-teams');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('team-manage', [AdminController::class, 'teamManage'])->name('admin-team-manages');
    Route::get('report/{id}', [AdminController::class, 'report'])->name('admin-report');
    Route::get('report-download/{id}', [AdminController::class, 'reportDownload'])->name('admin-report-download');
    
    Route::get('challenge/new', [AdminController::class, 'createChallenge'])->name('admin-create-challenge');
    Route::get('category/new', [AdminController::class, 'createCategory'])->name('admin-create-category');
    Route::get('information/new', [AdminController::class, 'createInformation'])->name('admin-create-information');
    Route::get('user/new', [AdminController::class, 'createUser'])->name('admin-create-user');
    Route::get('team/new', [AdminController::class, 'createTeam'])->name('admin-create-team');
    Route::get('team-manage/new', [AdminController::class, 'createManage'])->name('admin-create-team-manage');

    Route::post('challenge/store', [AdminController::class, 'storeChallenge'])->name('admin-store-challenge');
    Route::post('category/store', [AdminController::class, 'storeCategory'])->name('admin-store-category');
    Route::post('information/store', [AdminController::class, 'storeInformation'])->name('admin-store-information');
    Route::post('user/store', [AdminController::class, 'storeUser'])->name('admin-store-user');
    Route::post('team/store', [AdminController::class, 'storeTeam'])->name('admin-store-team');
    Route::post('team-manage/store', [AdminController::class, 'storeManage'])->name('admin-store-team-manage');

    Route::get('challenges/detail/{id}', [AdminController::class, 'detailChallenge'])->name('admin-challenge-detail');
    Route::get('category/detail/{id}', [AdminController::class, 'detailCategory'])->name('admin-category-detail');
    Route::get('information/detail/{id}', [AdminController::class, 'detailInformation'])->name('admin-information-detail');
    Route::get('user/detail/{id}', [AdminController::class, 'detailUser'])->name('admin-user-detail');
    Route::get('team/detail/{id}', [AdminController::class, 'detailTeam'])->name('admin-team-detail');

    Route::post('challenge/update/{id}', [AdminController::class, 'updateChallenge'])->name('admin-challenge-update');
    Route::post('category/update/{id}', [AdminController::class, 'updateCategory'])->name('admin-category-update');
    Route::post('information/update/{id}', [AdminController::class, 'updateInformation'])->name('admin-information-update');
    Route::post('user/update/{id}', [AdminController::class, 'updateUser'])->name('admin-user-update');
    Route::post('team/update/{id}', [AdminController::class, 'updateTeam'])->name('admin-team-update');

    Route::get('challenge/delete/{id}', [AdminController::class, 'deleteChallenge'])->name('admin-challenge-delete');
    Route::get('category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin-category-delete');
    Route::get('information/delete/{id}', [AdminController::class, 'deleteInformation'])->name('admin-information-delete');
    Route::get('user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin-user-delete');
    Route::get('team/delete/{id}', [AdminController::class, 'deleteTeam'])->name('admin-team-delete');
    Route::get('team-manage/delete/{id}', [AdminController::class, 'deleteManage'])->name('admin-team-manage-delete');
});