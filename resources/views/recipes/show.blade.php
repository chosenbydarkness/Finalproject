@extends('layouts.app')

@section('title', $recipe->title)

@section('content')
    <div class="content">
        <h2>{{ $recipe->title }}</h2>
        <p>By {{ $recipe->user->name }}</p>
        @if ($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="recipe-image">
        @endif

        <p>{{ $recipe->instructions }}</p>

        <h3>Ingredients</h3>
        <ul class="ingredient-list">
            @foreach($recipe->ingredients as $ingredient)
                <li>{{ $ingredient->name }} - {{ $ingredient->quantity }}</li>
            @endforeach
        </ul>

        <h3>Comments</h3>
        <ul class="comment-list">
            @foreach($recipe->comments as $comment)
                <li>{{ $comment->content }} - by {{ $comment->user->name }}</li>
            @endforeach
        </ul>

        @auth
            <h3>Add a Comment</h3>
            <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
                @csrf
                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                <div>
                    <label for="content">Comment:</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <button type="submit" class="btn">Add Comment</button>
            </form>

            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn">Edit</a>
            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn-delete">Delete</button>
            </form>
        @endauth
    </div>
@endsection








