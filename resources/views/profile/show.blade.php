@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="content">
        <h2>{{ $user->name }}'s Profile</h2>
        <div>
            <strong>Email:</strong>
            <p>{{ $user->email }}</p>
        </div>
        <div>
            <strong>Dietary Preferences:</strong>
            <ul>
                @foreach($user->preferences as $preference)
                    <li>{{ $preference->preference }}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('profile.edit') }}" class="btn">Edit Profile</a>
    </div>
@endsection

