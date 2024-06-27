<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'instructions' => 'required|string',
        ]);

        $recipe = new Recipe();
        $recipe->title = $request->title;
        $recipe->instructions = $request->instructions;
        $recipe->user_id = auth()->id();
        $recipe->save();

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





