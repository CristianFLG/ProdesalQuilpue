<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 50)->nullable();
            $table->string('ubicacion', 50)->nullable();
            $table->date('fecha_ini')->nullable();
            $table->date('fecha_ter')->nullable();
            $table->text('informacion')->nullable();
            $table->double('lat',15,8)->nullable();
            $table->double('lon',15,8)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos', function (Blueprint $table) {
            //
        });
    }
}
