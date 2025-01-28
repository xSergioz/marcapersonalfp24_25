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
        Schema::create('proyectosciclos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_id')
            ->nullable(false);
            $table->unsignedBigInteger('ciclo_id')
            ->nullable(false);
            $table->foreign('ciclo_id')
            ->references('id')->on('ciclos')
            ->onDelete('cascade');
            $table->foreign('proyecto_id')
            ->references('id')->on('proyectos')
            ->onDelete('cascade');
            $table->primary(['ciclo_id', 'proyecto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectosciclos');
    }
};
