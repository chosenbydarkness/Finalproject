<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('home') }}" class="navbar-brand">Recipe App</a>
        </div>
        <ul class="nav">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('recipes.index') }}" class="{{ request()->routeIs('recipes.index') ? 'active' : '' }}">Recipes</a></li>
            @auth
                <li><a href="{{ route('recipes.create') }}" class="{{ request()->routeIs('recipes.create') ? 'active' : '' }}">Add Recipe</a></li>
            @endauth
        </ul>
        <ul class="nav navbar-right">
            @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                        <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-button">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>









