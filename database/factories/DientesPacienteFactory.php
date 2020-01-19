<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DientesPaciente;
use App\Model;
use Faker\Generator as Faker;

$factory->define(DientesPaciente::class, function (Faker $faker) {
    static $number = 1;
    return [
        'nombre' => $faker->regexify('[1-4]{1}-[0-9]{1}'),
        'medida' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 5),
        'paciente_id' => $number++,
    ];
});
