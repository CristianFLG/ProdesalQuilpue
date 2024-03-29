<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_capitalcult')->unsigned();
            $table->integer('id_rubro')->unsigned();
            $table->string('nombre', 100);
            $table->string('rut',20);
            $table->integer('telefono')->length(10)->nullable();
            $table->string('lugar')->nullable();
            $table->string('redes')->nullable();
            $table->double('lat',15,8)->nullable();
            $table->double('lon',15,8)->nullable();
            $table->timestamps();
            //referencias
            $table->foreign('id_capitalcult')->references('id')->on('capitalculturals')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //referencias
            $table->foreign('id_rubro')->references('id')->on('rubros')
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
        Schema::dropIfExists('productors');
    }
}
