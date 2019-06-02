<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenPortadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_portada', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imagen_id')->unsigned();
            $table->integer('portada_id')->unsigned();
            $table->timestamps();
            //referencia
            $table->foreign('imagen_id')->references('id')->on('imagens')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('portada_id')->references('id')->on('portadas')
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
        Schema::dropIfExists('imagen_portada');
    }
}
