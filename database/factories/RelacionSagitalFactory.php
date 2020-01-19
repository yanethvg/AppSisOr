<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RelacionSagital;
use Faker\Generator as Faker;

$factory->define(RelacionSagital::class, function (Faker $faker) {
    static $number = 1;
    return [        
        'molarDerecha' => $faker->randomElement(['claseI','claseII','claseIII','NE','CC']),
        'molarIzquierda' => $faker->randomElement(['claseI','claseII','claseIII','NE','CC']),
        'caninaDerecha' => $faker->randomElement(['claseI','claseII','claseIII','NE','CC']),
        'caninaIzquierda' => $faker->randomElement(['claseI','claseII','claseIII','NE','CC']),
        'paciente_id' => $number++,
    ];
});
