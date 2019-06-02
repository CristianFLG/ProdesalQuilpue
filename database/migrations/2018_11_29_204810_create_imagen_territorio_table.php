<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenTerritorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_territorio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imagen_id')->unsigned();
            $table->integer('territorio_id')->unsigned();
            $table->timestamps();
            $table->foreign('territorio_id')->references('id')->on('territorios')
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
        Schema::dropIfExists('imagen_territorio');
    }
}
