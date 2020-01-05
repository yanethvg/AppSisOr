<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\AntecedenteOrtodoncico;
use Faker\Generator as Faker;

$factory->define(AntecedenteOrtodoncico::class, function (Faker $faker) {
    static $number = 1;
    return [
        'primerVisita' => $faker->boolean(),
        'problemaFamiliar' => $faker->boolean(),
        'segundaOpinion'=> $faker->boolean(),
        'tratamientoAnterior'=> $faker->boolean(),
        'esperaDeTratamiento' => $faker->text($maxNbChars = 50),  
        'paciente_id' => $number++,
    ];
});
