<?php

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create()->each(function($user){
            $user->assignRoles(Role::all()[random_int(0,3)]->slug);
        });

        User::create(
            [
            'nombre' => 'erick ventura',
            'usuario'=>'eventura',
            'email' => 'erick94111@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        )->assignRoles('admin');

        User::create(
            [
            'nombre' => 'zoila villatoro',
            'usuario'=>'zvillatoro',
            'email' => 'zoila@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        )->assignRoles('admin');

        User::create(
            [
            'nombre' => 'christian fuentes',
            'usuario'=>'cfuentes',
            'email' => 'christian@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        )->assignRoles('odontologo');


        User::create(
            [
            'nombre' => 'marcos fuentes',
            'usuario'=>'mfuentes',
            'email' => 'marcos@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        )->assignRoles('estrategico');

        User::create(
            [
            'nombre' => 'marcos christian',
            'usuario'=>'mcfuentes',
            'email' => 'mcfuente@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        )->assignRoles('tactico');

    }
}
