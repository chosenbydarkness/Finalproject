<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RecipeSeeder::class,
            IngredientSeeder::class,
            CommentSeeder::class,
            PreferenceSeeder::class,
        ]);
    }
}
