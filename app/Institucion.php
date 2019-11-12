<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    public $timestamps = false;

    protected $fillable=['carrera','grado','nombre'];

    protected $table = "instituciones";

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
