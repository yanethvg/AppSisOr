<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\DiagnosticoPrevio;
use Faker\Generator as Faker;

$factory->define(DiagnosticoPrevio::class, function (Faker $faker) {
    static $number = 1;
    return [
        'descripcion'=> $faker->text($maxNbChars = 100),
        'posible_tratamiento'=> $faker->text($maxNbChars = 75),
        'necesidades_odontologicas'=> $faker->text($maxNbChars = 75),
        'paciente_id' => $number++,
    ];
});
