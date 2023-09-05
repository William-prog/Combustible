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

        Schema::create('consumos', function (Blueprint $table) {

            $table->id();
            $table->string('placas')->nullable();
            $table->string('numeroTicket')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('numeroVale')->nullable();
            $table->string('CC')->nullable();
            $table->string('fecha')->nullable();

            $table->string('operador')->nullable();
            $table->string('producto')->nullable();
            $table->string('litros')->nullable();
            $table->string('precioLitro')->nullable();
            $table->string('total')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumos');
    }
};
