<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_imagen', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('imagen_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->timestamps();
            //referencia
            $table->foreign('imagen_id')->references('id')->on('imagens')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_imagen', function (Blueprint $table) {
            //
        });
    }
}
