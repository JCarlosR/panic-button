<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Diego Reyes',
            'email' => 'diegoreyes_22_7@hotmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Julio Rios',
            'email' => 'cesar87_287@hotmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Ana Lucia',
            'email' => 'anilucorcuera@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Giancarlo Mendez',
            'email' => 'giancarloymz@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Max Paico',
            'email' => 'maxpaico@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Javier Sanchez',
            'email' => 'javiersan18@hotmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Juan',
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
    }
}
