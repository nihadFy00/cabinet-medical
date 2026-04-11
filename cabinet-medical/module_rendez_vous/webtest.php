<?php
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('rendezvous', AppointmentController::class);
    Route::patch('rendezvous/{rendezvous}/confirm', [AppointmentController::class, 'confirm'])
        ->name('rendezvous.confirm');
    Route::post('rendezvous/{rendezvous}/reminder', [AppointmentController::class, 'sendReminder'])
        ->name('rendezvous.reminder');
});