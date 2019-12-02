<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bitacoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bitacoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario',50);
            $table->string('accion',250);
            $table->string('ip',15);
            $table->dateTime('fecha_hora');

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
        Schema::dropIfExists('Bitacoras');
    }
}
