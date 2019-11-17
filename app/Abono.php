<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    public $timestamps = false;

    protected $fillable=['monto','esPrima','fecha_emision'];

    protected $table = "abonos";

    public function planTratamiento(){
        return $this->belongsTo(PlanTratamiento::class);
    }
}
