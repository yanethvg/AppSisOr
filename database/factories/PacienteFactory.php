<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = ' - 18 years'),
        'padecimiento' => $faker->text($maxNbChars = 50),
        'direccion_trabajo' => $faker->address,
        'profesion' => $faker->randomElement(['Doctor','Ingeniero','Gerente','Licenciado']),
        'recomendacion' =>$faker->name,
        'direccion' => $faker->address
    ];
});
