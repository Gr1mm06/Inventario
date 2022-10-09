<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZapatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zapatos', function (Blueprint $table) {
            $table->increments('id_zapato');
            $table->unsignedInteger('id_modelo');
            $table->foreign('id_modelo')
                ->references('id_modelo')
                ->on('modelos')
                ->onDelete('cascade');
            $table->unsignedInteger('id_marca');
            $table->foreign('id_marca')
                ->references('id_marca')
                ->on('marcas')
                ->onDelete('cascade');
            $table->string('foto',50);
            $table->integer('cantidad');
            $table->integer('numero');
            $table->decimal('precio', $precision = 20, $scale = 2);
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
        Schema::dropIfExists('zapatos');
    }
}
