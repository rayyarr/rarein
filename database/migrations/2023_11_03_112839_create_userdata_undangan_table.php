<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdataUndanganTable extends Migration
{
    public function up()
    {
        Schema::create('userdata_undangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('total_undangan');
            $table->integer('undangan_dilihat');
            $table->integer('total_ucapan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('userdata_undangan');
    }
}
