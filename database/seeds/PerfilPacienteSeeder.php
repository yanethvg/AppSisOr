<?php

use Illuminate\Database\Seeder;

class PerfilPacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PerfilPaciente::class,20)->create();
    }
}
