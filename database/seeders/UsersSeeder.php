<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'user_id' =>'admin123',
            'role_id' =>1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),

        ]);

        $user = User::create([
            'user_id' =>'user123',
            'role_id' =>2,
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),

        ]);
    }
}
