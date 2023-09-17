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
        Schema::create('vale_combustibles', function (Blueprint $table) {
            $table->id();
            $table->String('valeEstado')->nullable();
            $table->date('valeFecha')->nullable();
            $table->String('valeNumero')->nullable();
            $table->String('valeSolicitante')->nullable();
            $table->String('valeDepartamento')->nullable();
            $table->String('valeArea')->nullable();
            $table->String('valeCc')->nullable();

            $table->String('valeEconomico')->nullable();
            $table->String('valePlacas')->nullable();
            $table->String('valeCombustible')->nullable();
            $table->String('valeMarca')->nullable();
            $table->String('valeModelo')->nullable();
            $table->String('valeAño')->nullable();
            $table->String('valeKilometraje')->nullable();
            $table->date('valeLitros')->nullable();
            $table->String('valeCantidad')->nullable();
            $table->timestamps();

        });
    }
    





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vale_combustibles');
    }
};
