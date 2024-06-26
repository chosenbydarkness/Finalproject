<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preference;
use App\Models\User;

class PreferenceSeeder extends Seeder
{
    public function run()
    {
        $john = User::where('name', 'john_doe')->first();
        $jane = User::where('name', 'jane_smith')->first();

        Preference::create([
            'user_id' => $john->id,
            'preference' => 'Vegetarian'
        ]);

        Preference::create([
            'user_id' => $jane->id,
            'preference' => 'Gluten-Free'
        ]);
    }
}

