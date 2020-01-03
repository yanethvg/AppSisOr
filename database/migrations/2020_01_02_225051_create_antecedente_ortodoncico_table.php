<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteOrtodoncicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_ortodoncico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('primerVisita');
            $table->boolean('problemaFamiliar');
            $table->boolean('segundaOpinion');
            $table->boolean('tratamientoAnterior');
            $table->string('esperaDeTratamiento',100)->nullable();
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
        Schema::dropIfExists('antecedente_ortodoncico');
    }
}
