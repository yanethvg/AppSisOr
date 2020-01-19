<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LineaMedia;
use Faker\Generator as Faker;

$factory->define(LineaMedia::class, function (Faker $faker) {
    static $number = 1;
    return [        
        'maxilar' =>  "Desviado",
        'mxDesviado' => $faker->randomElement(['derecha','izquierda']),
        'mxCantidad' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),
        'mandibula' =>  "Desviado",
        'mdDesviado' => $faker->randomElement(['derecha','izquierda']),
        'mdCantidad' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),
        'paciente_id' => $number++,
    ];
});
