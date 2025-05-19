<header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom bg-white shadow-sm px-3">

    <!-- Left Nav -->
    <ul class="nav col-md-auto mb-2 justify-content-start mb-md-0">
        <li><a href="{{ route('about') }}" class="nav-link px-2 text-dark">About</a></li>
    </ul>

    <!-- Center Branding -->
    <div class="mx-auto text-center">
        <a href="{{ route('welcome') }}" class="text-decoration-none fs-4 fw-bold text-primary">
            TechnyURecipe
        </a>
    </div>

    <!-- Right Section (Search or Auth Buttons) -->
    <div class="text-end d-flex align-items-center gap-2">
        @if(Route::currentRouteName() === 'recipes.explore')
            <form class="d-flex" method="GET" action="{{ route('recipes.explore') }}">
                <input class="form-control me-2" type="search" name="query" value="{{ request('query') }}" placeholder="Search recipes..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        @else
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
            @endauth
        @endif
    </div>
</header>
