<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTejidosIntraoralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tejidos_intraorales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inspeccion',100);
            $table->string('palpacion',100);
            $table->string('encias',100);
            $table->string('frenillos',100);
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
        Schema::dropIfExists('tejidos_intraorales');
    }
}
