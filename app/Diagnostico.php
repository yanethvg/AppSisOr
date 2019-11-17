<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    public $timestamps = false;

    protected $fillable=['cuidados','fecha_nacimiento','fecha_emision','fecha_actualizacion','diagnostico','desc_plan_tratamiento'];

    protected $table = "diagnosticos";

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
    public function planTratamiento(){
        return $this->hasOne(PlanTratamiento::class);
    }
}
