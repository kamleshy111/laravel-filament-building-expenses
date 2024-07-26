<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReportController;

Route::get('pdf/{report}', PdfController::class)->name('pdf');
Route::get('generate-report/{buildings}', ReportController::class)->name('generateReport');

Route::get('/', function () {
    return view('welcome');
});
