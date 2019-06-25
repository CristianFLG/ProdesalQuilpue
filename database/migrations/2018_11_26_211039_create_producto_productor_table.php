<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoProductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_productor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('productor_id')->unsigned();
            $table->timestamps();

            //referencias
            $table->foreign('producto_id')->references('id')->on('productos')
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
        Schema::dropIfExists('producto_productor');
    }
}
