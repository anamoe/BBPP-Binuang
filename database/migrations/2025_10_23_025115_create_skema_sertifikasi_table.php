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
        Schema::create('skema_sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('desc')->nullable();
            $table->foreignId('keahlian_id')->references('id')->on('keahlian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skema_sertifikasi');
    }
};
