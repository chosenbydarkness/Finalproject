<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'john_doe',
            'email' => 'john_doe@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'jane_smith',
            'email' => 'jane_smith@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
