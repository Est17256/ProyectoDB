<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Valoropcional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoropcional', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_campo')->unsigned();
            $table->string('valor');
            $table->string('nombre_campo');
            $table->foreign('id_campo')->references('id')->on('opcional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoropcional');
    }
}
