<?php

use App\User;
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
        factory(App\User::class, 10)->create();
        User::create(
            [
            'nombre' => 'erick ventura',
            'usuario'=>'eventura',
            'email' => 'erick94111@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        );

        User::create(
            [
            'nombre' => 'zoila villatoro',
            'usuario'=>'zvillatoro',
            'email' => 'zoila@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        );

        User::create(
            [
            'nombre' => 'christian fuentes',
            'usuario'=>'cfuentes',
            'email' => 'christian@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        );


        User::create(
            [
            'nombre' => 'marcos fuentes',
            'usuario'=>'mfuentes',
            'email' => 'marcos@fakemail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make("holamundo") , // password
            'remember_token' => Str::random(10),
            ]
        );
    }
}
