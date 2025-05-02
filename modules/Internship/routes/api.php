<?php

use Illuminate\Support\Facades\Route;
use Modules\Internship\Http\Controllers\InternshipController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('internships', InternshipController::class)->names('internship');
});
