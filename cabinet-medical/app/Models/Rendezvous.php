<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $table = 'rdv';
    protected $fillable = [
    'date_rdv', 
    'motif', 
    'statut', 
    'patient_id', 
    'medecin_id'
];
}
