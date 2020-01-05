<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteMedico extends Model
{
    public $timestamps = false;
    protected $table = 'antecedente_medico';
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
