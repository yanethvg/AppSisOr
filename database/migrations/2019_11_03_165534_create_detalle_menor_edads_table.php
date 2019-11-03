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
            $table->string('madre')->nullable();
            $table->string('padre')->nullable();
            $table->string('otro')->nullable();
            $table->string('ocupacion_madre')->nullable();
            $table->string('ocupacion_padre')->nullable();
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
