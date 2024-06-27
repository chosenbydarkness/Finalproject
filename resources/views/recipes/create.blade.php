@extends('layouts.app')

@section('title', 'Add Recipe')

@section('content')
    <div class="content">
        <h2>Add Recipe</h2>
        <form action="{{ route('recipes.store') }}" method="POST" class="recipe-form" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="instructions">Instructions:</label>
                <textarea id="instructions" name="instructions" required></textarea>
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div id="ingredients">
                <label>Ingredients:</label>
                <div class="ingredient-item">
                    <input type="text" name="ingredients[0][name]" placeholder="Ingredient name" required>
                    <input type="text" name="ingredients[0][quantity]" placeholder="Quantity" required>
                </div>
            </div>
            <button type="button" onclick="addIngredient()" class="btn">Add Another Ingredient</button>
            <button type="submit" class="btn">Add Recipe</button>
        </form>

        <script>
            let ingredientCount = 1;

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






