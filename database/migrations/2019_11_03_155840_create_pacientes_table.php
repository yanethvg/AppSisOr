<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->date('fecha_nacimiento');
            $table->string('padecimiento',100);
            $table->string('direccion_trabajo',150)->nullable();
            $table->string('profesion',50)->nullable();
            $table->string('recomendacion',50)->nullable();
            $table->string('direccion');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
