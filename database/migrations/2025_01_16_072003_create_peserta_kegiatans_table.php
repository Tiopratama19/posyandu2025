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
        Schema::create('peserta_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('id_informasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_kegiatan');
    }
};