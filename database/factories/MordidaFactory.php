<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mordida;
use Faker\Generator as Faker;

$factory->define(Mordida::class, function (Faker $faker) {
    static $number = 1;
    return [        
        'sobreMordidaHorizontal' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),        
        'sobreMordidadVertical' => $faker->randomElement(['1/3','2/3','3/3', 'profunda']),
        'mordidasCruzadas' =>  $faker->text($maxNbChars = 50),
        'paciente_id' => $number++,
    ];
});
