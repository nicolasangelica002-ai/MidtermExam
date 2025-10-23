<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('sections.index');
});

Route::resource('sections', SectionController::class);
Route::resource('students', StudentController::class);