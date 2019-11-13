<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMenorEdadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_menor_edad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('madre',50)->nullable();
            $table->string('padre',50)->nullable();
            $table->string('ocupacion_madre',50)->nullable();
            $table->string('ocupacion_padre',50)->nullable();
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_menor_edad');
    }
}
