<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacialFrontalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facial_frontal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facialFrontal',15)->nullable();
            $table->string('tercios',12);
            $table->boolean('simetria');
            $table->string('sonrisa',10);
            $table->boolean('competencia');
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
        Schema::dropIfExists('facial_frontal');
    }
}
