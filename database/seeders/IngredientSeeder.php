<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        Ingredient::create([
            'recipe_id' => 1,
            'name' => 'Spaghetti',
            'quantity' => '200g'
        ]);

        Ingredient::create([
            'recipe_id' => 1,
            'name' => 'Pancetta',
            'quantity' => '100g'
        ]);

        Ingredient::create([
            'recipe_id' => 2,
            'name' => 'Chicken',
            'quantity' => '500g'
        ]);

        Ingredient::create([
            'recipe_id' => 2,
            'name' => 'Coconut Milk',
            'quantity' => '400ml'
        ]);
    }
}
