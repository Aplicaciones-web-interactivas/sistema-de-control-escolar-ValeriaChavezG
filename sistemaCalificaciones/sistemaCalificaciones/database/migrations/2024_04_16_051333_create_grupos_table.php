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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nomMateria');
            $table->string('salon');
            $table->integer('NumAlumnos');
            $table->integer('numGrupo');
            $table->timestamps();
            $table->index('nomMateria');
            $table->foreign("nomMateria")->references("nombreM")->on("materias")->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
