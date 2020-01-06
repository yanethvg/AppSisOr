<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public $timestamps = false;


    public function institucion(){
        return $this->hasOne(Institucion::class);
    }

    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }

    public function detallesMenorEdad(){
        return $this->hasOne(DetalleMenorEdad::class);
    }

    public function syncTelefonos($telefonos){

        $telefonosInstances=[];
        foreach ($telefonos as $telefono) {
            array_push($telefonosInstances,  new Telefono(['telefono'=>$telefono]));
        }
        $this->telefonos()->saveMany($telefonosInstances);

    }
    public function antecedenteMedico(){
        return $this->hasOne(AntecedenteMedico::class);
    }
    public function antecedenteOdontologico(){
        return $this->hasOne(AntecedenteOdontologico::class);
    }
    public function antecedenteOrtodoncico(){
        return $this->hasOne(AntecedenteOrtodoncico::class);
    }
    public function diagnostico(){
        return $this->hasOne(Diagnostico::class);
    }
    public function diagnosticoPrevio(){
        return $this->hasOne(DiagnosticoPrevio::class);
    }
    public function citas(){
        return $this->hasMany(Cita::class);
    }

}
