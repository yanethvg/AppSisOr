<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMordidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mordidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('sobreMordidaHorizontal',6,2);
            $table->string('sobreMordidadVertical', 9);
            $table->string('mordidasCruzadas', 50);
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mordidas');
    }
}
