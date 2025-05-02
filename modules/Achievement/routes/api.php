<?php

use Illuminate\Support\Facades\Route;
use Modules\Achievement\Http\Controllers\AchievementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('achievements', AchievementController::class)->names('achievement');
});
