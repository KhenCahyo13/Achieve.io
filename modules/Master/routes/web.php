<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\DepartmentController;
use Modules\Master\Http\Controllers\MasterController;
use Modules\Master\Http\Controllers\PeriodController;
use Modules\Master\Http\Controllers\StudyProgramController;


Route::middleware(['check-auth'])->prefix('master')->group(function () {
    // Department Controller
    Route::prefix('departments')->group(function () {
        Route::controller(DepartmentController::class)->group(function () {
            Route::get('', 'index')->name('master.department.index')->middleware('can:view department');
        });
    });
    // Study Program Controller
    Route::prefix('studyprograms')->group(function () {
        Route::controller(StudyProgramController::class)->group(function () {
            Route::get('', 'index')->name('master.studyprogram.index')->middleware('can:view study program');
        });
    });
    // Period Controller
    Route::prefix('periods')->group(function () {
        Route::controller(PeriodController::class)->group(function () {
            Route::get('', 'index')->name('master.period.index')->middleware('can:view period');
        });
    });
});