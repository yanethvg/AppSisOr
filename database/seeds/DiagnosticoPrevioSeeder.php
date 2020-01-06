<?php

use Illuminate\Database\Seeder;
use App\DiagnosticoPrevio;

class DiagnosticoPrevioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DiagnosticoPrevio::class,20)->create();
    }
}
