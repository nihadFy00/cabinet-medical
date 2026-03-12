<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
    'date_consultation', 
    'notes_medecin', 
    'poids', 
    'tension', 
    'rendezvous_id'
];
}
