<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

/**
 * v1 API
 */

Route::group(['prefix' => 'v1'], function () {
    // Auth
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login', [PassportAuthController::class, 'login']);

    // Category
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/{category}', [CategoryController::class, 'show']);

    Route::middleware('auth:api')->group(function () {
        // Auth
        Route::post('logout', [PassportAuthController::class, 'logout']);

        // Category
        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::put('category/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{category}', [CategoryController::class, 'destroy']);

        // Profile
        Route::get('profile/list', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile/update', [profileController::class, 'update'])->name('profile.update');
    });
});
