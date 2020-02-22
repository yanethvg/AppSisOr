<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cefalometrico extends Model
{
    protected $table = 'cefalometrico';
    public $timestamps = false;
    protected $fillable = ['nombre','valor', 'valorRegular','descripcion', 'menor', 'normal', 'mayor'];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
