<?php

use Illuminate\Database\Seeder;

class DenticionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Denticion::class,20)->create();
    }
}
