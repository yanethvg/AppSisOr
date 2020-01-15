<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discrepancia extends Model
{
    protected $table = 'espacio_discrepancia';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
