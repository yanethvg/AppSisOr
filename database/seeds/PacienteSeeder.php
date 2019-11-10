<?php

use Illuminate\Database\Seeder;
use App\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Paciente::class,2000)->create();
    }
}
