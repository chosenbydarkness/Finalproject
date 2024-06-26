<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Recipe;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $john = User::where('name', 'john_doe')->first();
        $jane = User::where('name', 'jane_smith')->first();
        $recipe1 = Recipe::where('title', 'Chicken Curry')->first();
        $recipe2 = Recipe::where('title', 'Spaghetti Carbonara')->first();

        Comment::create([
            'user_id' => $john->id,
            'recipe_id' => $recipe1->id,
            'content' => 'This Chicken Curry recipe is amazing!'
        ]);

        Comment::create([
            'user_id' => $jane->id,
            'recipe_id' => $recipe2->id,
            'content' => 'Loved the Spaghetti Carbonara!'
        ]);
    }
}


