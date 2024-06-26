<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\User;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $john = User::where('name', 'john_doe')->first();
        $jane = User::where('name', 'jane_smith')->first();

        Recipe::create([
            'user_id' => $john->id,
            'title' => 'Spaghetti Carbonara',
            'instructions' => 'Boil pasta. Cook pancetta. Mix with eggs and cheese.'
        ]);

        Recipe::create([
            'user_id' => $jane->id,
            'title' => 'Chicken Curry',
            'instructions' => 'Cook chicken. Add spices and coconut milk. Simmer until done.'
        ]);
    }
}

