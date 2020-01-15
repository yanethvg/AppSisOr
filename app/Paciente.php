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

    public function facialFrontal(){
        return $this->hasOne(FacialFrontal::class);
    }

    public function perfilPaciente(){
        return $this->hasOne(PerfilPaciente::class);
    }

    public function tejidoIntraoral(){
        return $this->hasOne(TejidoIntraoral::class);
    }

    public function denticion(){
        return $this->hasOne(Denticion::class);
    }

    public function lineaMedia(){
        return $this->hasOne(LineaMedia::class);
    }

    public function mordida(){
        return $this->hasOne(Mordida::class);
    }
    
    public function relacionSagital(){
        return $this->hasOne(RelacionSagital::class);
    }

    public function espacioDiscrepancia(){
        return $this->hasOne(Discrepancia::class);
    }

    public function dientes(){
        return $this->hasMany(DientesPaciente::class);
    }

    public function syncDientes($dientes){

        $dientesInstances=[];
        foreach ($dientes as $diente) {
            array_push($dientesInstances,  new DientesPaciente(['nombre'=>$diente['nombre'], 'medida'=>$diente['medida']]));
        }
        $this->dientes()->saveMany($dientesInstances);

    }
}
