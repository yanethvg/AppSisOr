<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_tratamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad_pagos');
            $table->date('fecha');
            $table->time('tiempo_estimado');
            $table->float('presupuesto');
            $table->string('descripcion',50);
            $table->bigInteger('diagnostico_id')->unsigned();
            $table->foreign('diagnostico_id')->references('id')->on('diagnosticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_tratamientos');
    }
}
