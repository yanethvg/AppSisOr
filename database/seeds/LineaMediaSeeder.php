<?php

use Illuminate\Database\Seeder;

class LineaMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LineaMedia::class,20)->create();
    }
}
