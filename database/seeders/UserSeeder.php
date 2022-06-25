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
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);

        $user->create([
            'name' => 'Hussam Haider',
            'email' => 'hussam@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Hassan Khalid',
            'email' => 'gruce@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Hassan Hazim',
            'email' => 'hazim@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Hassan Kadhim',
            'email' => 'hassan@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->create([
            'name' => 'Zainab Amjed',
            'email' => 'zainab@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 2
        ]);

        for($i = 1 ; $i <= 20 ; $i++)
            User::create([
                'name' => 'user ' . $i,
                'email' => $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => rand(1,2),
            ]);
    }
}
