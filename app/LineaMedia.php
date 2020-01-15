<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaMedia extends Model
{
    protected $table = 'lineas_medias';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
