require base_path('module_rendez_vous/webtest.php');
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;

Route::get('/test-mail', function () {
    // On récupère un RDV de test avec Eloquent
    $appointment = Appointment::first(); 
    return new AppointmentConfirmation($appointment);
});