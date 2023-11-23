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
        Schema::create('userdata_pasangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasangan_id');
            $table->string('nama_pria')->nullable();
            $table->string('nama_wanita')->nullable();
            $table->string('tanggal_pernikahan')->nullable();
            $table->string('waktu_pernikahan')->nullable();
            $table->string('tempat_pernikahan')->nullable();
            $table->timestamps();

            $table->foreign('pasangan_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdata_pasangan');
    }
};