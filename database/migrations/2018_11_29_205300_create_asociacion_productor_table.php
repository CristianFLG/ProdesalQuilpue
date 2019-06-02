<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsociacionProductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacion_productor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asociacion_id')->unsigned();
            $table->integer('productor_id')->unsigned();

            $table->timestamps();
            //asociacion
             $table->foreign('asociacion_id')->references('id')->on('asociacions')
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
        Schema::dropIfExists('asociacion_productor');
    }
}
