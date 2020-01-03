<?php

use Illuminate\Database\Seeder;
use App\AntecedenteOrtodoncico;
class AntecedenteOrtodoncicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\AntecedenteOrtodoncico::class,20)->create();
    }
}
