<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionesSagitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relaciones_sagitales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('molarDerecha',10);
            $table->string('molarIzquierda',10);
            $table->string('caninaDerecha',10);
            $table->string('caninaIzquierda',10);
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
        Schema::dropIfExists('relaciones_sagitales');
    }
}
