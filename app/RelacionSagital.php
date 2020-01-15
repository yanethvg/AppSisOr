<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelacionSagital extends Model
{
    protected $table = 'relaciones_sagitales';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
