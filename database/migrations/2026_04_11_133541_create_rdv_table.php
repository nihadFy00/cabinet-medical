<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rdv', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_rdv');
            $table->string('motif');
            $table->string('statut')->default('pending');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('medecin_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rdv');
    }
};