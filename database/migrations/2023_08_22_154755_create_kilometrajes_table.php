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
        Schema::create('kilometrajes', function (Blueprint $table) {
            $table->id();
            $table->string('kmEco')->nullable();
            $table->string('kmFecha')->nullable();
            $table->string('kmKilometraje')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kilometrajes');
    }
};
