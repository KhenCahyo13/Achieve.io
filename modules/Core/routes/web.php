<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Core\Http\Controllers\NotificationController;

Route::middleware(['check-auth'])->group(function () {
    Route::controller(NotificationController::class)->prefix('notifications')->group(function () {
        Route::get('mark-as-read/{id}', 'markAsRead')->name('core.notification.mark-as-read');
    });
});
