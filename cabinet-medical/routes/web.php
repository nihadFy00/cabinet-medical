<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrdonnanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('consultations', ConsultationController::class);
Route::resource('ordonnances', OrdonnanceController::class);