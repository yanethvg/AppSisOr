<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_medico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('alergia');
            $table->boolean('artritis');
            $table->boolean('asma');
            $table->string('consumeMedicamento',100)->nullable();
            $table->boolean('desmayo');
            $table->boolean('diabetes');
            $table->boolean('enfermedadOperacion');
            $table->boolean('enfermedadVenerea');
            $table->boolean('gastritis');
            $table->boolean('hepatitis');
            $table->boolean('presionAlta');
            $table->boolean('renal');
            $table->boolean('saludAnio');
            $table->boolean('sida');
            $table->boolean('sinusitis');
            $table->boolean('tomaMedicamento');
            $table->boolean('transtornoSangre');
            $table->boolean('tuberculosis');
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
        Schema::dropIfExists('antecedente_medico');
    }
}
