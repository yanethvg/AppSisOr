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

}
