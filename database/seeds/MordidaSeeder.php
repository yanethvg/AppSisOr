<?php

use Illuminate\Database\Seeder;

class MordidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Mordida::class,20)->create();
    }
}
