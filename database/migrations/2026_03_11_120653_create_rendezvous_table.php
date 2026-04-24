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
       Schema::create('rdv', function (Blueprint $table) {
        $table->id();
        $table->dateTime('date_rdv');
        $table->enum('statut', ['en_attente', 'confirme', 'annule', 'termine'])->default('en_attente'); // Gestion des statuts [cite: 88]
        $table->text('motif')->nullable();
        $table->foreignId('patient_id')->constrained()->onDelete('cascade');
        $table->foreignId('medecin_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};
