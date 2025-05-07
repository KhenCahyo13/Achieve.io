<?php

use Illuminate\Support\Facades\Route;
use Modules\Achievement\Http\Controllers\CompetitionController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('achievements', AchievementController::class)->names('achievement');
// });

Route::prefix('achievement')->group(function () {
    Route::prefix('competitions')->group(function () {
        Route::controller(CompetitionController::class)->group(function () {
            Route::get('', 'index')->name('achievement.competition.index');
            Route::get('create', 'create')->name('achievement.competition.create');
        });
    });
});
