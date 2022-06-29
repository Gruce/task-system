<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = new User;
        $user->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);

        $user->create([
            'name' => 'Hussam Haider',
            'email' => 'hussam@gmail.com',
            'username' => 'hmh_6',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Hassan Khalid',
            'email' => 'gruce@gmail.com',
            'username' => 'gruce',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Hassan Hazim',
            'email' => 'hazim@gmail.com',
            'username' => 'hazim',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Hassan Kadhim',
            'email' => 'hassan@gmail.com',
            'username' => 'hassan',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Zainab Amjed',
            'email' => 'zainab@gmail.com',
            'username' => 'zainab',
            'password' => bcrypt('123456'),
            'gender' => 2
        ]);

        for($i = 1 ; $i <= 20 ; $i++)
            User::create([
                'name' => 'user ' . $i,
                'email' => $i . '@gmail.com',
                'username' => $i,
                'password' => bcrypt('123456'),
                'gender' => rand(1,2),
            ]);
    }
}
