<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;

/**
 * v1 API
 */
Route::group(['prefix' => 'v1'], function () {
    // Auth
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login', [PassportAuthController::class, 'login']);

    // Category
    Route::get('category', [CategoryController::class, 'index'])->name('api.category.index');
    Route::get('category/{category}', [CategoryController::class, 'show']);

    Route::middleware('auth:api')->group(function () {
        // Auth
        Route::post('logout', [PassportAuthController::class, 'logout']);

        // Category
        Route::post('category', [CategoryController::class, 'store'])->name('api.category.store');
        Route::put('category/{category}', [CategoryController::class, 'update'])->name('api.category.update');
        Route::delete('category/{category}', [CategoryController::class, 'destroy']);
    });
});
