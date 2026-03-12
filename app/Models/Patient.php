<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'code_patient', 'nom', 'prenom', 'date_naissance', 
        'genre', 'telephone', 'antecedents_medicaux'
    ];
}
