<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerritoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territorios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productor_id')->unsigned();
            $table->string('coordenadas')->nullable();;
            $table->string('alcantarillado')->nullable();;
            $table->string('superficie')->nullable();;
            $table->string('estanque')->nullable();;
            $table->string('pradera')->nullable();;
            $table->integer('colmenar')->length(50)->unsigned();
            $table->timestamps();
            //relacion
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
        Schema::dropIfExists('territorios');
    }
}
