<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescToTemplateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('template', function (Blueprint $table) {
            $table->string('desc')->after('price'); // Menambah kolom 'desc' setelah kolom 'image'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('template', function (Blueprint $table) {
            $table->dropColumn('desc');
        });
    }
}
