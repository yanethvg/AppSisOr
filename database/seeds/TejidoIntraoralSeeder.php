<?php

use Illuminate\Database\Seeder;

class TejidoIntraoralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TejidoIntraoral::class,20)->create();
    }
}
