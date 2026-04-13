<?php

namespace Tests\Feature;

use App\Models\Consultation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConsultationTest extends TestCase
{
    use RefreshDatabase;


    public function test_can_view_consultations_list()
    {
        $response = $this->get('/consultations');
        $response->assertStatus(200);
    }

    
    public function test_can_create_consultation()
    {
        $response = $this->post('/consultations', [
            'rendezvous_id' => 1,
            'compte_rendu'  => 'Patient en bonne santé',
            'diagnostic'    => 'Aucune maladie',
            'traitement'    => 'Repos',
        ]);
        $response->assertRedirect('/consultations');
        $this->assertDatabaseHas('consultations', [
            'compte_rendu' => 'Patient en bonne santé',
        ]);
    }

    public function test_can_delete_consultation()
    {
        $consultation = Consultation::create([
            'rendezvous_id' => 1,
            'compte_rendu'  => 'Test',
            'diagnostic'    => 'Test',
            'traitement'    => 'Test',
        ]);

        $response = $this->delete('/consultations/' . $consultation->id);
        $response->assertRedirect('/consultations');
        $this->assertDatabaseMissing('consultations', ['id' => $consultation->id]);
    }
}