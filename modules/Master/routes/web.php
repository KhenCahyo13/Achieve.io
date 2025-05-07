<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\DepartmentController;
use Modules\Master\Http\Controllers\MasterController;
use Modules\Master\Http\Controllers\StudyProgramController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('masters', MasterController::class)->names('master');
// });

Route::prefix('master')->group(function () {
    Route::prefix('departments')->group(function () {
        Route::controller(DepartmentController::class)->group(function () {
            Route::get('', 'index')->name('master.department.index');
        });
    });
    Route::prefix('studyprograms')->group(function () {
        Route::controller(StudyProgramController::class)->group(function () {
            Route::get('', 'index')->name('master.studyprogram.index');
        });
    });
});
