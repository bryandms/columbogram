<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Bryan',
            'email' => 'bryan@mail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'María',
            'email' => 'maria@mail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'Ana',
            'email' => 'ana@mail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
