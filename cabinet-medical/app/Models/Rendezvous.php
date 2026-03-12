<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $fillable = [
    'date_rendezvous', 
    'heure_rendezvous', 
    'motif', 
    'statut', 
    'patient_id', 
    'medecin_id'
];
}
