<header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom bg-white shadow-sm">
  
  <ul class="nav col-md-auto mb-2 justify-content-start mb-md-0">
    <li><a href="{{ route('recipes.explore') }}" class="nav-link px-2 text-dark">Explore</a></li>
    <li><a href="{{ route('about') }}" class="nav-link px-2 text-dark">About</a></li>
  </ul>


  <div class="mx-auto text-center">
    <a href="{{ route('welcome') }}" class="text-decoration-none fs-4 fw-bold text-primary">
      TechnyURecipe
    </a>
  </div>

  <div class="text-end">
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
      @csrf
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>
  </div>

</header>
