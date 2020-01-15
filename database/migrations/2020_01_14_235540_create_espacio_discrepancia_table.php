<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacioDiscrepanciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacio_discrepancia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDecimal('longitudArcoMx', 6, 2);
            $table->unsignedDecimal('longitudArcoMd', 6, 2);
            $table->unsignedDecimal('boltonAnterior', 6, 2);
            $table->unsignedDecimal('boltonTotal', 6, 2);
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
        Schema::dropIfExists('espacio_discrepancia');
    }
}
