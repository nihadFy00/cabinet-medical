<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medecin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MedecinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création de l'utilisateur obligatoire pour le médecin
        $user = User::create([
            'name' => 'Dr Aris',
            'email' => 'dr.aris@example.com',
            'password' => Hash::make('password123'), // Mot de passe sécurisé
        ]);
        Medecin::create([
            'user_id' => $user->id,
            'nom' => 'Dr. Aris',
            'specialite' => 'Généraliste',
            'telephone' => '0612345678',
        ]);
    }
}
