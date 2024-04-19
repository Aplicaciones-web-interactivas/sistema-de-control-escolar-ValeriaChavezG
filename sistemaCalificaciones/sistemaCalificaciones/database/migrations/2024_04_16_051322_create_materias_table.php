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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombreM');
            $table->string('nomProf');
            $table->string('Modalidad');
            $table->string('Horario');
            $table->timestamps();
            $table->index('nombreM');
            $table->foreign("nomProf")->references("nom_Prof")->on("maestros")->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign("nombreM")->references("nomMateria")->on("grupos")->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
