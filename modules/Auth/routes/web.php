<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\ForgotPasswordController;
use Modules\Auth\Http\Controllers\SignInController;
use Modules\Auth\Http\Controllers\SignOutController;
use Modules\Auth\Http\Controllers\SignUpController;
use Modules\Auth\Http\Controllers\VerificationController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('auths', AuthController::class)->names('auth');
// });

Route::prefix('auth')->group(function () {
    // Sign In Controller
    Route::controller(SignInController::class)->prefix('signin')->group(function () {
        Route::get('', 'index')->name('auth.signin.index');
    });
    // Sign Up Controller
    Route::controller(SignUpController::class)->prefix('signup')->group(function () {
        Route::get('', 'index')->name('auth.signup.index');
    });
    // Sign Out Controller
    Route::controller(SignOutController::class)->prefix('signout')->group(function () {
        Route::get('', 'action')->name('auth.signout.action');
    });
    // Verification Controller
    Route::controller(VerificationController::class)->prefix('verification')->group(function () {
        Route::get('email/{id}', 'email')->name('auth.verification.email');
    });
    // Forgot Password Controller
    Route::controller(ForgotPasswordController::class)->prefix('forgot-password')->group(function () {
        Route::get('', 'index')->name('auth.forgot-password.index');
        Route::get('{id}/reset-password', 'resetPage')->name('auth.forgot-password.reset-page');
    });
});
