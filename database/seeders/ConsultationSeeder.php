<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Medecin;

class ConsultationSeeder extends Seeder
{
    public function run(): void
    {
        $patient = Patient::first();
        $medecin = Medecin::first();

        if ($patient && $medecin) {
            Consultation::create([
                'date_consultation' => '2026-03-15',
                'notes_medecin' => 'Le patient se porte bien.',
                'poids' => 75.5,
                'tension' => 12.8,
                'rendezvous_id' => null,
                'patient_id' => $patient->id,
                'medecin_id' => $medecin->id,
            ]);
        }
    }
}
