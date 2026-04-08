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
        
        // Clés étrangères simplifiées
        $table->unsignedBigInteger('patient_id');
        $table->unsignedBigInteger('medecin_id');
        $table->unsignedBigInteger('rendezvous_id')->nullable();

        // Champs de données
        $table->date('date_consultation');
        $table->text('notes_medecin');
        $table->float('poids')->nullable();
        $table->float('tension')->nullable();
        $table->timestamps();

        // Définition des contraintes APRES la création des colonnes
        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('cascade');
        $table->foreign('rendezvous_id')->references('id')->on('rendezvous')->onDelete('set null');
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
