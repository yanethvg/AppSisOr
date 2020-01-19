<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PerfilPaciente;
use Faker\Generator as Faker;

$factory->define(PerfilPaciente::class, function (Faker $faker) {
    static $number = 1;
    return [
        'perfilSuperior' => $faker->randomElement(['ortognatico','divAnte', 'divPost']),
        'perfilInferior' => $faker->randomElement(['recto', 'concavo','convexo']),
        'anguloNasolabial' => $faker->randomElement(['normal','aumentado','distanciado']),
        'nariz' => $faker->randomElement(['normal','grande','pequeña']),
        'labios' => $faker->randomElement(['competente','incompetente']),
        'paciente_id' => $number++,
    ];
});
