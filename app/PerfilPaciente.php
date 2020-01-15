<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilPaciente extends Model
{
    protected $table = 'perfil_paciente';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
