<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('consultations', ConsultationController::class);
Route::resource('ordonnances', OrdonnanceController::class);
Route::get('ordonnances/{id}/pdf', [OrdonnanceController::class, 'generatePDF'])->name('ordonnances.pdf');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');