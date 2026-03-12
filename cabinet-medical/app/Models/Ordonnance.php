<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $fillable = [
    'contenu', 
    'date_prescription', 
    'consultation_id'
];
}
