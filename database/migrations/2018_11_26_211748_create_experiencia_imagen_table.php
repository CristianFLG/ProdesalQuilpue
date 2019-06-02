<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_imagen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experiencia_id')->unsigned();
            $table->integer('imagen_id')->unsigned();
            $table->timestamps();
            //references
            $table->foreign('experiencia_id')->references('id')->on('experiencias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('imagen_id')->references('id')->on('imagens')
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
        Schema::dropIfExists('img_experiencia');
    }
}
