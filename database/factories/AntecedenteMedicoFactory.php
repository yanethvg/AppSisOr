<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\AntecedenteMedico;
use Faker\Generator as Faker;

$factory->define(AntecedenteMedico::class, function (Faker $faker) {
    static $number = 1;
    return [
        'alergia' => $faker->boolean(),
        'artritis'=> $faker->boolean(),
        'asma'=> $faker->boolean(),
        'consumeMedicamento'=> $faker->text($maxNbChars = 50),
        'desmayo'=> $faker->boolean(),
        'diabetes'=> $faker->boolean(),
        'enfermedadOperacion'=> $faker->boolean(),
        'enfermedadVenerea'=> $faker->boolean(),
        'gastritis'=> $faker->boolean(),
        'hepatitis'=> $faker->boolean(),
        'presionAlta'=> $faker->boolean(),
        'renal'=> $faker->boolean(),
        'saludAnio'=> $faker->boolean(),
        'sida'=> $faker->boolean(),
        'sinusitis'=> $faker->boolean(),
        'tomaMedicamento'=> $faker->boolean(),
        'transtornoSangre'=> $faker->boolean(),
        'tuberculosis'=> $faker->boolean(),
        'paciente_id' => $number++,
    ];
});
