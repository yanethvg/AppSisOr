<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DientesPaciente extends Model
{
    protected $table = 'dientes_paciente';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
