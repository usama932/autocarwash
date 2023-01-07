<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'roled' => 'admin',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('users'),
            'roled' => 'user',
        ]);
    }
}
