<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->string('code_patient')->unique(); // Requis pour la recherche
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->enum('genre', ['Homme', 'Femme']);
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->text('adresse')->nullable();
            $table->text('antecedents_medicaux')->nullable(); // Historique médical
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Annule la migration (supprime la table).
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};