<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\RendezvousController;

Route::get("/", function () {
    return view("welcome");
});

<<<<<<< HEAD
// ─── Agent de circulation : Redirection après Login ───
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('doctor')) {
        return redirect()->route('doctor.dashboard');
    } elseif ($user->hasRole('secretary')) {
        return redirect()->route('secretary.dashboard');
    } elseif ($user->hasRole('patient')) {
        return redirect()->route('patient.dashboard');
    }

    // Sécurité par défaut si l'utilisateur n'a aucun rôle
    abort(403, 'Accès refusé : Aucun rôle assigné.');
})->middleware(['auth', 'verified'])->name('dashboard');
=======
Route::get("/dashboard", function () {
    return view("dashboard");
})->middleware(["auth", "verified"])->name("dashboard");
>>>>>>> 477a3a31b7c466fdb92c6cf36f0537ff94bfa7f4

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});

<<<<<<< HEAD
require __DIR__.'/auth.php';

// ─── Dashboards par rôle ───
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
});

Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])
        ->name('doctor.dashboard');
});

Route::middleware(['auth', 'role:secretary'])->group(function () {
    Route::get('/secretary/dashboard', [SecretaryController::class, 'dashboard'])
        ->name('secretary.dashboard');
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])
        ->name('patient.dashboard');
});

// ─── Module Patients & Médecins (Sécurisé) ───
// Seuls les admins et secrétaires peuvent gérer la liste
Route::middleware(['auth', 'role:admin|secretary'])->group(function () {
    Route::resource('patients', PatientController::class);
    Route::resource('medecins', MedecinController::class);
});

// ─── Module Rendez-vous (Sécurisé) ───
// Tout le monde peut y accéder, mais les droits seront filtrés par les contrôleurs
Route::middleware(['auth', 'role:admin|secretary|doctor|patient'])->group(function () {
    Route::resource('rendezvous', RendezvousController::class);
});
=======
require __DIR__."/auth.php";

Route::middleware(["auth", "role:admin"])->group(function () {
    Route::get("/admin/dashboard", [AdminController::class, "dashboard"])->name("admin.dashboard");
});

Route::middleware(["auth", "role:doctor"])->group(function () {
    Route::get("/doctor/dashboard", [DoctorController::class, "dashboard"])->name("doctor.dashboard");
});

Route::middleware(["auth", "role:secretary"])->group(function () {
    Route::get("/secretary/dashboard", [SecretaryController::class, "dashboard"])->name("secretary.dashboard");
});

Route::middleware(["auth", "role:patient"])->group(function () {
    Route::get("/patient/dashboard", [PatientController::class, "dashboard"])->name("patient.dashboard");
});

Route::middleware(["auth"])->group(function () {
    Route::resource("patients", PatientController::class);
    Route::resource("medecins", MedecinController::class);
    Route::resource("rendezvous", RendezvousController::class);
});
>>>>>>> 477a3a31b7c466fdb92c6cf36f0537ff94bfa7f4
