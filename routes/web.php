<?php
use Illuminate\Support\Facades\Route;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-mail', function () {
    return new AppointmentConfirmation();
});

require base_path('module_rendez_vous/webtest.php');