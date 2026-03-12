<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\Rendezvous;


class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $rdv = Rendezvous::first();

        Consultation::create([
            'date_consultation' => '2026-03-15',
            'notes_medecin' => 'Le patient se porte bien. Bonne tension.',
            'poids' => 75.5,
            'tension' => 12.8,
            'rendezvous_id' => $rdv->id,
            'patient_id' => $rdv->patient_id, 
            'medecin_id' => $rdv->medecin_id,
        ]);
    }
}
