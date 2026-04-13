<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // 👈 CETTE LIGNE MANQUAIT
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Créer les 4 rôles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'doctor']);
        Role::create(['name' => 'secretary']);
        Role::create(['name' => 'patient']);

        // Créer un utilisateur test pour chaque rôle
        $admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin@cabinet.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $doctor = User::create([
            'name' => 'Docteur Test',
            'email' => 'doctor@cabinet.com',
            'password' => Hash::make('password123'),
        ]);
        $doctor->assignRole('doctor');

        $secretary = User::create([
            'name' => 'Secretaire Test',
            'email' => 'secretary@cabinet.com',
            'password' => Hash::make('password123'),
        ]);
        $secretary->assignRole('secretary');

        $patient = User::create([
            'name' => 'Patient Test',
            'email' => 'patient@cabinet.com',
            'password' => Hash::make('password123'),
        ]);
        $patient->assignRole('patient');
    }
}