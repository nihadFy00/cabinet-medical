<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
        $table->id();
        $table->date('date_consultation');
        $table->text('compte_rendu'); // Saisie du compte-rendu [cite: 91]
        $table->foreignId('patient_id')->constrained()->onDelete('cascade');
        $table->foreignId('medecin_id')->constrained()->onDelete('cascade');
        $table->foreignId('rendezvous_id')->nullable()->constrained('rendezvous')->onDelete('set null');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
