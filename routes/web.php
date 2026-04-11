<?php

use Illuminate\Support\Facades\Route;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-mail', function () {
    // Ghadi n-testiw ghi l-vue bla ma n-7tajo l-base de données daba
    return new AppointmentConfirmation();
});