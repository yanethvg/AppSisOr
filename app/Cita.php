<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    public $timestamps = false;

    protected $fillable=['fecha_hora_inicio','asistencia','fecha_hora_fin'];

    protected $table = "citas";

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
    public function planTratamiento(){
        return $this->belongsTo(PlanTratamiento::class);
    }
}
