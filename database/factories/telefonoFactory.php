<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Telefono;
use Faker\Generator as Faker;

$factory->define(Telefono::class, function (Faker $faker) {
    static $number = 1;
    return [
        'telefono' => $faker->numerify('####-####') ,
        'paciente_id' => $number++,
    ];
});
