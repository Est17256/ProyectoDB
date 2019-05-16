<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LineaFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_factura', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('id')->unsigned();;
            $table->bigInteger('cantidad');
            $table->bigInteger('precio');
            $table->integer('id_facturas')->unsigned();
            $table->integer('id_productos')->unsigned();
            $table->foreign('id_facturas')->references('id')->on('facturas');
            $table->foreign('id_productos')->references('id')->on('productos');
            $table->primary(array('id', 'id_facturas'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_factura');
    }
}
