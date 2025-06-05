<?php

use Illuminate\Support\Facades\Route;
use Modules\Achievement\Http\Controllers\AchievementController;
use Modules\Achievement\Http\Controllers\CompetitionController;

Route::middleware(['check-auth'])->prefix('achievement')->group(function () {
    // Competition Controller
    Route::controller(CompetitionController::class)->prefix('competitions')->group(function () {
        Route::get('', 'index')->name('achievement.competition.index')->middleware('can:view competition');
        Route::get('create', 'create')->name('achievement.competition.create')->middleware('can:create competition');
        Route::get('edit/{id}', 'edit')->name('achievement.competition.edit')->middleware('can:update competition');
    });
    // Achievement Controller
    Route::controller(AchievementController::class)->prefix('achievements')->group(function () {
        Route::get('', 'index')->name('achievement.achievement.index')->middleware('can:view achievement');
    });
});
