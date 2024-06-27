@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
    <div class="content">
        <h2>Recipes</h2>
        <form action="{{ route('recipes.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search recipes..." value="{{ request()->query('search') }}" class="search-input">
            <button type="submit" class="btn">Search</button>
        </form>
        <ul class="recipe-list">
            @foreach($recipes as $recipe)
                <li class="recipe-item">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="recipe-link">{{ $recipe->title }}</a> by {{ $recipe->user->name }}
                    @auth
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn-delete">Delete</button>
                        </form>
                    @endauth
                </li>
            @endforeach
        </ul>
    </div>
@endsection






