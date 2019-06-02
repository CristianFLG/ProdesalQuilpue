<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenProductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_productor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imagen_id')->unsigned();
            $table->integer('productor_id')->unsigned();
            $table->timestamps();
            
            //referencias
            $table->foreign('imagen_id')->references('id')->on('imagens')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('productor_id')->references('id')->on('productors')
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
        Schema::dropIfExists('imgen_productor');
    }
}
