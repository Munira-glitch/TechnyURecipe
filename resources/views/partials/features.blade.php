@php
    $apiKey = env('SPOONACULAR_API_KEY');
    $response = Illuminate\Support\Facades\Http::get("https://api.spoonacular.com/recipes/random", [
        'number' => 2,
        'apiKey' => $apiKey,
    ]);
    $featuredRecipes = $response->successful() ? $response['recipes'] : [];
@endphp

<div class="row mb-2">
  @foreach($featuredRecipes as $recipe)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 d-flex">
        <div class="col p-4 d-flex flex-column flex-grow-1">
          <strong><h3 class="mb-0 font-weight-bold">{{ $recipe['title'] }}</h3></strong>
          <div class="mb-1 text-body-secondary">{{ now()->format('M d') }}</div>
          <p class="card-text flex-grow-1">
            {{ \Illuminate\Support\Str::limit(strip_tags($recipe['summary'] ?? 'No description available.'), 150) }}
          </p>
          <a href="https://spoonacular.com/recipes/{{ Str::slug($recipe['title']) }}-{{ $recipe['id'] }}" target="_blank" class="icon-link gap-1 icon-link-hover stretched-link view-recipe mt-auto">
            View Recipe
          </a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" width="250" height="250" style="object-fit: cover;">
        </div>
      </div>
    </div>
  @endforeach
</div>

<style>
  .view-recipe {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
  }

  .view-recipe:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  .row .row {
    height: 100%;
  }

  .card-text {
    flex-grow: 1;
  }
</style>
