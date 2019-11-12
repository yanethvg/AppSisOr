<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMenorEdad extends Model
{
    public $timestamps = false;
    protected $fillable=['madre','padre','ocupacion_madre','ocupacion_padre'];

    protected $table = "detalles_menor_edad";


    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
