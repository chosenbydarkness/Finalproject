<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="header">
                <div class="content">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Recipe App. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>


