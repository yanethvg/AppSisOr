<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\AntecedenteOdontologico;
use Faker\Generator as Faker;

$factory->define(AntecedenteOdontologico::class, function (Faker $faker) {
    static $number = 1;
    return [
        'accidente' => $faker->regexify('[A-Za-z]{20}'),
        'chequeDental' => $faker->regexify('[A-Za-z]{20}'),
        'habito' => $faker->regexify('[A-Za-z]{20}'), 
        'paciente_id' => $number++,
    ];
});
