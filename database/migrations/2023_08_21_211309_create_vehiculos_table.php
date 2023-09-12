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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('vehiculoEco')->nullable();
            $table->string('vehiculoPlacas')->nullable();
            $table->string('vehiculoModelo')->nullable();
            $table->string('vehiculoMarca')->nullable();
            $table->year('vehiculoAño')->nullable();
            $table->string('vehiculoCombustible')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
