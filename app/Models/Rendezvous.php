<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $table = 'rendezvous';
    protected $fillable = [
        'date_rdv', 
        'motif', 
        'statut', 
        'patient_id', 
        'medecin_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}