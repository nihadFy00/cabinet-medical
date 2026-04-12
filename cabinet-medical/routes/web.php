<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedecinController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show');

Route::get('/medecins', [MedecinController::class, 'index'])->name('medecins.index');
Route::get('/medecins/create', [MedecinController::class, 'create'])->name('medecins.create');
Route::post('/medecins', [MedecinController::class, 'store'])->name('medecins.store');

require __DIR__.'/auth.php';
