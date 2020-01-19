<?php

use Illuminate\Database\Seeder;

class RelacionSagitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RelacionSagital::class,20)->create();
    }
}
