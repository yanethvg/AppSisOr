<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(PermissionsAndRolesSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(PacienteSeeder::class);
      $this->call(TelefonoSeeder::class);
      $this->call(AntecedenteMedicoSeeder::class);
      $this->call(AntecedenteOdontologicoSeeder::class);
      $this->call(AntecedenteOrtodoncicoSeeder::class);
      $this->call(DiagnosticoPrevioSeeder::class);
    }
}
