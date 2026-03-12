<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rendezvous;
use App\Models\Patient;
use App\Models\Medecin;

class RendezvousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // On récupère le premier patient et le premier médecin créés précédemment
        $patient = Patient::first();
        $medecin = Medecin::first();

        Rendezvous::create([
            'date_rdv' => '2026-03-15 10:30:00',
            'motif' => 'Consultation de routine',
            'statut' => 'Confirmé',
            'patient_id' => $patient->id,
            'medecin_id' => $medecin->id,
        ]);
    }
}
