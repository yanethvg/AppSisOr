<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacialFrontal extends Model
{
    protected $table = 'facial_frontal';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
