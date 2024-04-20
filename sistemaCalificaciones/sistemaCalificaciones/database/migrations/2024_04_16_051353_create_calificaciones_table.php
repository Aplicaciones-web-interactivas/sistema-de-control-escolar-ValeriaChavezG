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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_alumno');
            $table->string('Nombre_Materia');
            $table->string('Parcial');
            $table->string('Calificacion');
            $table->foreign("Nombre_alumno")->references("nom_Alumn")->on("alumnos")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("Nombre_Materia")->references("nombreM")->on("materias")->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
