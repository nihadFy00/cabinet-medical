<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient; // Importation du modèle
class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Patient 1
        Patient::create([
            'code_patient' => 'P-2026-001',
            'nom' => 'Alami',
            'prenom' => 'Yassine',
            'date_naissance' => '1990-05-12',
            'genre' => 'Homme',
            'telephone' => '0661223344',
            'antecedents_medicaux' => 'Allergie à la pénicilline',
        ]);

        // Patient 2
        Patient::create([
            'code_patient' => 'P-2026-002',
            'nom' => 'Bennani',
            'prenom' => 'Sara',
            'date_naissance' => '1985-11-28',
            'genre' => 'Femme',
            'telephone' => '0670556677',
            'antecedents_medicaux' => 'Asthme chronique',
        ]);

        // Patient 3
        Patient::create([
            'code_patient' => 'P-2026-003',
            'nom' => 'Tazi',
            'prenom' => 'Omar',
            'date_naissance' => '2010-02-15',
            'genre' => 'Homme',
            'telephone' => '0650889900',
            'antecedents_medicaux' => 'Aucun',
        ]);
    }
}
