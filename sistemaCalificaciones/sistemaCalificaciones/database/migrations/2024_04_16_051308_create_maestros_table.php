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
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('nom_Prof');
            $table->string('nom_materia');
            $table->string('correo');
            // $table->integer('grupo');
            $table->timestamps();
            $table->index('nom_Prof');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
