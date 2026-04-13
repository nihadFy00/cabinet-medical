<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rendezvous;
use App\Models\Patient;
use App\Models\Medecin;

class RendezvousSeeder extends Seeder
{
    public function run(): void
    {
        $patient = Patient::first();
        $medecin = Medecin::first();

        if ($patient && $medecin) {
            Rendezvous::create([
                'date_rdv' => '2026-03-15 10:30:00',
                'motif' => 'Consultation de routine',
                'statut' => 'confirme',
                'patient_id' => $patient->id,
                'medecin_id' => $medecin->id,
            ]);
        }
    }
}