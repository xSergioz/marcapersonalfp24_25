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
        Schema::create('actividad_reconocimiento', function (Blueprint $table) {
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('reconocimiento_id');

            $table->foreignId('actividad_id')->references("id")->on("actividades")->onDelete('cascade');
            $table->foreignId('reconocimiento_id')->references("id")->on("reconocimientos")->onDelete('cascade');

            $table->primary(['actividad_id', 'reconocimiento_id']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad_reconocimiento');

    }
};
