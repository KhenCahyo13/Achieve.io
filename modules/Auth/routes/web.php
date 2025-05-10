<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\SignInController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('auths', AuthController::class)->names('auth');
// });

Route::prefix('auth')->group(function() {
    Route::prefix('signin')->group(function() {
        Route::controller(SignInController::class)->group(function() {
            Route::get('', 'index')->name('auth.signin.index');
        });
    });
});
