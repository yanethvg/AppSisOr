<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanTratamiento extends Model
{
    public $timestamps = false;

    protected $fillable=['cantidad_pagos','fecha','tiempo_estimado','presupuesto','descripcion'];

    protected $table = "plan_tratamientos";

    public function diagnostico(){
        return $this->belongsTo(Diagnostico::class);
    }
    public function abono(){
        return $this->hasMany(Abono::class);
    }
    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
