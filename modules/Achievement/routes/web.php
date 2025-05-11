<?php

use Illuminate\Support\Facades\Route;
use Modules\Achievement\Http\Controllers\CompetitionController;

Route::middleware(['check-auth'])->prefix('achievement')->group(function () {
    // Competition Controller
    Route::prefix('competitions')->group(function () {
        Route::controller(CompetitionController::class)->group(function () {
            Route::get('', 'index')->name('achievement.competition.index')->middleware('can:view competition');
            Route::get('create', 'create')->name('achievement.competition.create')->middleware('can:create competition');
            Route::get('edit/{id}', 'edit')->name('achievement.competition.edit')->middleware('can:update competition');
        });
    });
});
