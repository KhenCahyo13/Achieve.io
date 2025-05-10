<?php

use Illuminate\Support\Facades\Route;
use Modules\Achievement\Http\Controllers\CompetitionController;

Route::middleware(['check-auth'])->prefix('achievement')->group(function () {
    // Competition Controller
    Route::prefix('competitions')->group(function () {
        Route::controller(CompetitionController::class)->group(function () {
            Route::get('', 'index')->name('achievement.competition.index');
            Route::get('create', 'create')->name('achievement.competition.create');
            Route::get('edit/{id}', 'edit')->name('achievement.competition.edit');
        });
    });
});
