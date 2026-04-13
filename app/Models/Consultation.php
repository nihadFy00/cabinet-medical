<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'rendezvous_id',
        'compte_rendu',
        'diagnostic',
        'traitement',
    ];

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }
}