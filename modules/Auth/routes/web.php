<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\SignInController;
use Modules\Auth\Http\Controllers\SignOutController;
use Modules\Auth\Http\Controllers\SignUpController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('auths', AuthController::class)->names('auth');
// });

Route::prefix('auth')->group(function () {
    Route::controller(SignInController::class)->prefix('signin')->group(function () {
        Route::get('', 'index')->name('auth.signin.index');
    });

    Route::controller(SignUpController::class)->prefix('signup')->group(function () {
        Route::get('', 'index')->name('auth.signup.index');
        Route::get('verify/{id}', 'verify')->name('auth.signup.verify');
    });

    Route::controller(SignOutController::class)->prefix('signout')->group(function () {
        Route::get('', 'action')->name('auth.signout.action');
    });
});
