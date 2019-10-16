<?php

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name"=>"Administrador",
            "slug"=>"admin",
            "description"=>" Administrador con ciertos permisos en el sistema"
            ]);

        Role::create([
            "name"=>"Usuario Tactico",
            "slug"=>"tactico",
            "description"=>"Usuario tactico del sistema"
                ]);


        Role::create([
            "name"=>"Usuario Estrategico",
            "slug"=>"estrategico",
            "description"=>"Usuario estrategico del sistema"
                ]);


        Role::create([
            "name"=>"Odontologo",
            "slug"=>"odontologo",
            "description"=>"Usuario tactico del sistema"
                ]);


            }
}
