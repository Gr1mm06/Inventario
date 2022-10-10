<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_detalle', function (Blueprint $table) {
            $table->increments('id_carrito_detalle');
            $table->unsignedInteger('id_carrito');
            $table->foreign('id_carrito')
                ->references('id_carrito')
                ->on('carrito')
                ->onDelete('cascade');
            $table->unsignedInteger('id_zapato');
            $table->foreign('id_zapato')
                ->references('id_zapato')
                ->on('zapatos')
                ->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('total', $precision = 20, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_detalle');
    }
}
