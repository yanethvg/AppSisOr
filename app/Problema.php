<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    public $timestamps = false;

    protected $fillable=['problema'];

    protected $table = "problemas";

    public function diagnostico(){
        return $this->belongsTo(Diagnostico::class);
    }
}
