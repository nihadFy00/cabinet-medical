<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Spatie\Permission\Traits\HasRoles; // 👈 AJOUTER cette ligne
=======
use Illuminate\Database\Eloquent\Relations\HasOne;
>>>>>>> 477a3a31b7c466fdb92c6cf36f0537ff94bfa7f4

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles; // 👈 AJOUTER HasRoles ici

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
<<<<<<< HEAD
}
=======
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    /**
     * Relation vers le profil Médecin [cite: 14, 17]
     */
    public function medecin(): HasOne
    {
        return $this->hasOne(Medecin::class);
    }
}
>>>>>>> 477a3a31b7c466fdb92c6cf36f0537ff94bfa7f4
