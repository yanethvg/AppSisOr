<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TejidoIntraoral;
use Faker\Generator as Faker;

$factory->define(TejidoIntraoral::class, function (Faker $faker) {
    static $number = 1;
    return [
        'inspeccion' => $faker->text($maxNbChars = 75),
        'palpacion' => $faker->text($maxNbChars = 75),
        'encias' => $faker->text($maxNbChars = 75),
        'frenillos' => $faker->text($maxNbChars = 75),
        'paciente_id' => $number++,
    ];
});
