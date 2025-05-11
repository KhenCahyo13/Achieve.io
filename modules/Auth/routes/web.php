<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\SignInController;
use Modules\Auth\Http\Controllers\SignOutController;
use Modules\Auth\Http\Controllers\SignUpController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('auths', AuthController::class)->names('auth');
// });

Route::prefix('auth')->group(function() {
    Route::prefix('signin')->group(function() {
        Route::controller(SignInController::class)->group(function() {
            Route::get('', 'index')->name('auth.signin.index');
        });
    });

    Route::prefix('signup')->group(function() {
        Route::controller(SignUpController::class)->group(function() {
            Route::get('', 'index')->name('auth.signup.index');
        });
    });

    Route::prefix('signout')->group(function() {
        Route::controller(SignOutController::class)->group(function() {
            Route::get('', 'action')->name('auth.signout.action');
        });
    });
});
