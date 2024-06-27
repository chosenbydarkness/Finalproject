@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="content">
        <h2>Welcome to the Recipe App</h2>
        <p>Find and share your favorite recipes.</p>
        <a href="{{ route('recipes.index') }}" class="btn">Browse Recipes</a>
    </div>
@endsection




