<?php

use Illuminate\Support\Facades\Route;
use Modules\Internship\Http\Controllers\InternshipController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('internships', InternshipController::class)->names('internship');
});
