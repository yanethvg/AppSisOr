<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Denticion;
use Faker\Generator as Faker;

$factory->define(Denticion::class, function (Faker $faker) {
    static $number = 1;
    return [
        'denticion' => $faker->randomElement(['primario','mixto','permanente']),
        'faltantes' =>  $faker->text($maxNbChars = 75),
        'paciente_id' => $number++,
    ];
});
