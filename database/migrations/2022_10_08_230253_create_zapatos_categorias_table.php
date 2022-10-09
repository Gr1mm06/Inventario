<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZapatosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zapatos_categorias', function (Blueprint $table) {
            $table->increments('id_zapatos_categorias');
            $table->unsignedInteger('id_zapato');
            $table->foreign('id_zapato')
                ->references('id_zapato')
                ->on('zapatos')
                ->onDelete('cascade');
            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria')
                ->references('id_categoria')
                ->on('categorias')
                ->onDelete('cascade');
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
        Schema::dropIfExists('zapatos_categorias');
    }
}
