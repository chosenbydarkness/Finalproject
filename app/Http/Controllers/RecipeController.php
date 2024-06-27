<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create',compact('recipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'instructions' => 'required|string',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.quantity' => 'required|string|max:255',
        ]);

        $recipe = new Recipe();
        $recipe->author = $request->author;
        $recipe->title = $request->title;
        $recipe->instructions = $request->instructions;
        $recipe->user_id = auth()->id();
        $recipe->save();

        foreach ($request->ingredients as $ingredient) {
            $recipe->ingredients()->create([
                'name' => $ingredient['name'],
                'quantity' => $ingredient['quantity'],
            ]);
        }

        return redirect()->route('recipes.index');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'instructions' => 'required|string',
        ]);

        $recipe->title = $request->title;
        $recipe->instructions = $request->instructions;
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
    
}






