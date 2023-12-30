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
        Schema::create('userdata_template', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->unsigned();
            $table->unsignedBigInteger('templates_id');
            $table->unsignedBigInteger('users_id');
            $table->string('foto_pria')->default('default_pria.webp');
            $table->string('foto_wanita')->default('default_wanita.webp');
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->string('link')->nullable();
            $table->timestamps();

            $table->foreign('templates_id')->references('id')->on('template')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdata_template');
    }
};
