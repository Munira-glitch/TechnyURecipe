<header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
 
  <ul class="nav col-md-auto mb-2 justify-content-start mb-md-0">
    <li><a href="{{ route('about') }}" class="nav-link px-2">About</a></li>
  </ul>


  <div class="mx-auto text-center">
    <a href="{{ route('welcome') }}" class="text-decoration-none fs-4 fw-bold text-primary">
      TechnyURecipe
    </a>
  </div>

 
  <div class="text-end">
    @guest
      <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
      <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
    @endguest

    @auth
      <a href="{{ route('dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
      <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    @endauth
  </div>
</header>
