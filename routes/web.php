<?php
use Illuminate\Support\Facades\Route;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;

Route::get('/maquettes/login', function () {
    return file_get_contents(public_path('maquettes/login.html'));
});

Route::get('/maquettes/dashboard', function () {
    return file_get_contents(public_path('maquettes/dashboard.html'));
});

Route::get('/maquettes/appointments', function () {
    return file_get_contents(public_path('maquettes/appointments.html'));
});