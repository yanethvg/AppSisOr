<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    public $timestamps = false;

    protected $fillable=['objetivo'];

    protected $table = "objetivos";

    public function diagnostico(){
        return $this->belongsTo(Diagnostico::class);
    }
}
