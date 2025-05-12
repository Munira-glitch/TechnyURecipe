<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-white px-4 shadow-sm">
    <!-- Logo / App Name -->


    <!-- Nav Links -->
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><b><a href="{{ route('welcome') }}" class="nav-link px-2 link-dark">Home</a></li></b>
        <li><b><a href="{{ route('recipes.index') }}" class="nav-link px-2 link-dark">Explore</a></li></b>
        <li>

        </li>
    </ul>
    <div class="col-md-3 mb-2 mb-md-0"><center>
        <a href="{{ route('dashboard') }}" class="d-inline-flex align-items-center link-dark text-decoration-none fs-4 fw-bold">
            🍽️ TechnyURecipe
        </a></center>
    </div>

    <!-- Profile Dropdown / Logout -->
    <div class="col-md-3 text-end">
        <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
