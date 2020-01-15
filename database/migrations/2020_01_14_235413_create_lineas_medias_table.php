<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineasMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_medias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maxilar', 10);
            $table->string('mxDesviado', 10)->nullable();
            $table->unsignedDecimal('mxCantidad', 6, 2)->nullable();
            $table->string('mandibula', 10);
            $table->string('mdDesviado', 10)->nullable();
            $table->unsignedDecimal('mdCantidad', 6, 2)->nullable();
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
        Schema::dropIfExists('lineas_medias');
    }
}
