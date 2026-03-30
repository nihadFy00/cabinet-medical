<?php

namespace Tests\Feature;

use App\Models\Ordonnance;
use App\Models\Consultation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdonnanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_ordonnances_list()
    {
        $response = $this->get('/ordonnances');
        $response->assertStatus(200);
    }

    public function test_can_create_ordonnance()
    {
        $consultation = Consultation::create([
            'rendezvous_id' => 1,
            'compte_rendu'  => 'Test',
            'diagnostic'    => 'Test',
            'traitement'    => 'Test',
        ]);

        $response = $this->post('/ordonnances', [
            'consultation_id' => $consultation->id,
            'medicaments'     => 'Paracetamol 500mg',
            'instructions'    => 'Prendre 3 fois par jour',
            'date_ordonnance' => '2026-03-28',
        ]);

        $response->assertRedirect('/ordonnances');
        $this->assertDatabaseHas('ordonnances', [
            'medicaments' => 'Paracetamol 500mg',
        ]);
    }

    public function test_can_generate_pdf()
    {
        $consultation = Consultation::create([
            'rendezvous_id' => 1,
            'compte_rendu'  => 'Test',
            'diagnostic'    => 'Test',
            'traitement'    => 'Test',
        ]);

        $ordonnance = Ordonnance::create([
            'consultation_id' => $consultation->id,
            'medicaments'     => 'Paracetamol',
            'instructions'    => 'Test',
            'date_ordonnance' => '2026-03-28',
        ]);

        $response = $this->get('/ordonnances/' . $ordonnance->id . '/pdf');
        $response->assertStatus(200);
    }
}