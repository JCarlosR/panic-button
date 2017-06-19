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
            'name' => 'Juan',
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
    }
}
