<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    public $timestamps = false;

    protected $fillable=['telefono'];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
