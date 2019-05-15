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
            $table->engine = 'MyISAM';
            $table->integer('id')->unsigned();
            $table->integer('id_campo');
            $table->string('valor');
            $table->string('nombre_campo');
            $table->foreign('id_campo')->references('id')->on('opcional');
            $table->primary(array('id', 'id_campo'));

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
