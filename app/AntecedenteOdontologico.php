<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteOdontologico extends Model
{
    public $timestamps = false;
    protected $table = 'antecedente_odontologico';
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
