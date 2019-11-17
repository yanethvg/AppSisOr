<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosticoPrevio extends Model
{
    public $timestamps = false;

    protected $fillable=['descripcion','posible_tratamiento'];

    protected $table = "diagnostico_previo";

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
