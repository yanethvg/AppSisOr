<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TejidoIntraoral extends Model
{
    protected $table = 'tejidos_intraorales';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
