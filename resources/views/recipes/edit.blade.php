@extends('layouts.app')

@section('title', 'Edit Recipe')

@section('content')
    <div class="content">
        <h2>Edit Recipe</h2>
        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" class="recipe-form">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $recipe->title }}" required>
            </div>
            <div>
                <label for="instructions">Instructions:</label>
                <textarea id="instructions" name="instructions" required>{{ $recipe->instructions }}</textarea>
            </div>
            <div id="ingredients">
                <label>Ingredients:</label>
                @foreach($recipe->ingredients as $ingredient)
                    <div class="ingredient-item">
                        <input type="text" name="ingredients[{{ $loop->index }}][name]" value="{{ $ingredient->name }}" required>
                        <input type="text" name="ingredients[{{ $loop->index }}][quantity]" value="{{ $ingredient->quantity }}" required>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addIngredient()" class="btn">Add Another Ingredient</button>
            <button type="submit" class="btn">Update Recipe</button>
        </form>

        <script>
            let ingredientCount = "{{ $recipe->ingredients->count() }}";

            function addIngredient() {
                const div = document.createElement('div');
                div.classList.add('ingredient-item');
                div.innerHTML = `
                    <input type="text" name="ingredients[${ingredientCount}][name]" placeholder="Ingredient name" required>
                    <input type="text" name="ingredients[${ingredientCount}][quantity]" placeholder="Quantity" required>
                `;
                document.getElementById('ingredients').appendChild(div);
                ingredientCount++;
            }
        </script>
    </div>
@endsection



