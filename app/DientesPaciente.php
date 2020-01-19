<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DientesPaciente extends Model
{
    protected $table = 'dientes_paciente';
    public $timestamps = false;
    protected $fillable = ['nombre','medida'];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
