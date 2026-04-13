<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ordonnance;
use App\Models\Consultation;

class OrdonnanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On récupère la consultation qu'on vient de créer
        $consultation = Consultation::first();

        if ($consultation) {
            Ordonnance::create([
                'contenu' => "Paracétamol 500mg : 1 comprimé 3 fois par jour pendant 5 jours.\nSirop pour la toux : 1 cuillère à soupe soir et matin.",
                'date_prescription' => now(), // Date actuelle
                'consultation_id' => $consultation->id,
            ]);
    }
}
}