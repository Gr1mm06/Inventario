<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_detalle', function (Blueprint $table) {
            $table->increments('id_venta_detalle');
            $table->unsignedInteger('id_venta');
            $table->foreign('id_venta')
                ->references('id_venta')
                ->on('ventas')
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
        Schema::dropIfExists('ventas_detalle');
    }
}
