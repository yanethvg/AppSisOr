<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discrepancia;
use Faker\Generator as Faker;

$factory->define(Discrepancia::class, function (Faker $faker) {
    static $number = 1;
    return [        
        'longitudArcoMx' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'longitudArcoMd' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'boltonAnterior' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'boltonTotal' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'paciente_id' => $number++,
    ];
});
