<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FacialFrontal;
use Faker\Generator as Faker;

$factory->define(FacialFrontal::class, function (Faker $faker) {
    static $number = 1;
    return [
        'facialFrontal' => $faker->randomElement(['dolico','facial','branquifacial']),
        'tercios' => $faker->regexify('[0-9]{1,2}-[0-9]{1,2}-[0-9]{1,2}'),
        'simetria'=> $faker->boolean(),
        'sonrisa' => $faker->randomElement(['Dental','Ginvival']),
        'competencia' => $faker->boolean(),
        'paciente_id' => $number++,
    ];
});
