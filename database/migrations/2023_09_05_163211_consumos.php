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
            $table->biginteger('numeroTicket')->nullable();
            $table->string('descripcion')->nullable();
            $table->bigInteger('numeroVale')->nullable();
            $table->string('CC')->nullable();
            $table->date('fecha')->nullable();

            $table->string('operador')->nullable();
            $table->string('producto')->nullable();
            $table->double('litros')->nullable();
            $table->double('precioLitro')->nullable();
            $table->double('total')->nullable();

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
