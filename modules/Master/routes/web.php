<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\DepartmentController;
use Modules\Master\Http\Controllers\PeriodController;
use Modules\Master\Http\Controllers\ProfileController;
use Modules\Master\Http\Controllers\RolePermissionsController;
use Modules\Master\Http\Controllers\StudyProgramController;
use Modules\Master\Http\Controllers\UserController;

Route::middleware(['check-auth'])->prefix('master')->group(function () {
    // User Controller
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('master.user.index')->middleware('can:view user');
    });
    // Department Controller
    Route::controller(DepartmentController::class)->prefix('departments')->group(function () {
        Route::get('', 'index')->name('master.department.index')->middleware('can:view department');
    });
    // Study Program Controller
    Route::controller(StudyProgramController::class)->prefix('studyprograms')->group(function () {
        Route::get('', 'index')->name('master.studyprogram.index')->middleware('can:view study program');
    });
    // Period Controller
    Route::controller(PeriodController::class)->prefix('periods')->group(function () {
        Route::get('', 'index')->name('master.period.index')->middleware('can:view period');
    });
    // Profile Controller
    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('', 'index')->name('master.profile.index');
    });
    // Role Permissions Controller
    Route::controller(RolePermissionsController::class)->prefix('role-permissions')->group(function () {
        Route::get('', 'index')->name('master.role-permissions.index')->middleware('can:view role permissions');
        Route::get('create', 'create')->name('master.role-permissions.create')->middleware('can:create role permissions');
        Route::get('edit/{id}', 'edit')->name('master.role-permissions.edit')->middleware('can:update role permissions');
    });
});
