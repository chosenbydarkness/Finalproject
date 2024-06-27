@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="content">
        <h2>Edit Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="btn">Update Profile</button>
        </form>

        <h3 class="mt-4">Dietary Preferences</h3>
        <form action="{{ route('profile.preferences.update') }}" method="POST" class="preferences-form">
            @csrf
            @method('PUT')
            <div>
                <label for="preferences">Preferences (comma-separated):</label>
                <input type="text" id="preferences" name="preferences" value="{{ implode(', ', $preferences) }}">
            </div>
            <button type="submit" class="btn">Update Preferences</button>
        </form>
    </div>
@endsection




