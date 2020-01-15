<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mordida extends Model
{
    protected $table = 'mordidas';
    public $timestamps = false;
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
