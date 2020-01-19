<?php

use Illuminate\Database\Seeder;

class DientesPacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DientesPaciente::class,20)->create();
    }
}
