<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteOrtodoncico extends Model
{
    public $timestamps = false;
    protected $table = 'antecedente_ortodoncico';
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
