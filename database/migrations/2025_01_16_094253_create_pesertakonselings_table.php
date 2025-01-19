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
        Schema::create('pesertakonselings', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 55);
            $table->string('nama', 55);
            $table->string('email', 55);
            $table->unsignedBigInteger('id_konselings'); // Foreign key column
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_konselings')
                ->references('id')
                ->on('jadwalkonselings')
                ->onDelete('cascade'); // Add cascade on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertakonselings');
    }
};