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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_dataremaja');
            $table->string('Tanggal')->nullable();
            $table->string('BB')->nullable();
            $table->string('TB')->nullable();
            $table->string('TTD')->nullable();
            $table->string('LILA')->nullable();
            $table->string('LP')->nullable();
            $table->string('Anemia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};