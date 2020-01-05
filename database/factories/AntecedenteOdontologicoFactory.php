<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\AntecedenteOdontologico;
use Faker\Generator as Faker;

$factory->define(AntecedenteOdontologico::class, function (Faker $faker) {
    static $number = 1;
    return [
        'accidente' => $faker->text($maxNbChars = 50),
        'chequeDental' => $faker->text($maxNbChars = 50),
        'habito' => $faker->text($maxNbChars = 50), 
        'paciente_id' => $number++,
    ];
});
