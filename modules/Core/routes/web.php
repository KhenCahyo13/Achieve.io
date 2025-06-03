<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\DashboardController;
use Modules\Core\Http\Controllers\NotificationController;

Route::middleware(['check-auth'])->group(function () {
    // Dashboard Routes
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('', 'index')->name('core.dashboard');
    });
    // Notification Routes
    Route::controller(NotificationController::class)->prefix('notifications')->group(function () {
        Route::get('mark-as-read/{id}', 'markAsRead')->name('core.notification.mark-as-read');
    });
});
