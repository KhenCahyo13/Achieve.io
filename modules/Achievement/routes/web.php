<?php

use Illuminate\Support\Facades\Route;
use Modules\Achievement\Http\Controllers\AchievementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('achievements', AchievementController::class)->names('achievement');
});
