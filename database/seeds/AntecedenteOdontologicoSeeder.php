<?php

use Illuminate\Database\Seeder;
use App\AntecedenteOdontologico;

class AntecedenteOdontologicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AntecedenteOdontologico::class,20)->create();
    }
}
