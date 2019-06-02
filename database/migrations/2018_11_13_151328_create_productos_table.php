<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rubro')->unsigned();
            $table->string('nombre_producto', 50);
            $table->string('derivado', 50)->nullable();
            $table->integer('stock')->length(10)->unsigned();
            $table->string('medida',50)->nullable();
            $table->integer('precio')->length(10)->unsigned(); 
            $table->timestamps();
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
        Schema::dropIfExists('productos');
    }
}
