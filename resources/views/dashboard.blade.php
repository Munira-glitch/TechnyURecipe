@extends("layouts.app")

@section("title", "Dashboard")

@section("content")
<x-dashboard-navbar />
<x-recipehero />

<div class="container mt-5">
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Hello, {{ Auth::user()->name }} 👋</h2>
        <p class="text-gray-600">Welcome back to your dashboard. Here’s a quick overview of your activity.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="p-4 bg-white shadow rounded-lg border">
            <h3 class="text-xl font-semibold text-gray-700">Total Recipes</h3>
            <p class="text-3xl font-bold text-green-600">{{ $recipes->count() }}</p>
        </div>
        <div class="p-4 bg-white shadow rounded-lg border">
            <h3 class="text-xl font-semibold text-gray-700">Likes Received</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $recipes->sum(fn($r) => $r->likes->count()) }}</p>
        </div>
        <div class="p-4 bg-white shadow rounded-lg border">
            <h3 class="text-xl font-semibold text-gray-700">Comments</h3>
            <p class="text-3xl font-bold text-purple-600">{{ $recipes->sum(fn($r) => $r->comments->count()) }}</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-3xl font-bold text-gray-800">My Recipes</h1>
        <a href="{{ route('recipes.create') }}" class="btn btn-success shadow">
            <i class="bi bi-plus-circle"></i> Add New Recipe
        </a>
    </div>

    @if ($recipes->isEmpty())
        <div class="alert alert-info">
            You haven't created any recipes yet.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($recipes as $recipe)
                <div 
                    class="card shadow-sm rounded-lg overflow-hidden border border-gray-200 cursor-pointer"
                    data-bs-toggle="modal"
                    data-bs-target="#recipeModal"
                    data-title="{{ $recipe->title }}"
                    data-description="{{ $recipe->description }}"
                    data-ingredients="{{ implode(',', $recipe->ingredients) }}"
                    data-instructions="{{ $recipe->instructions }}"
                    data-category="{{ $recipe->category->name }}"
                    data-image="{{ $recipe->image ? asset('storage/' . $recipe->image) : '' }}"
                >
                    @if ($recipe->image)
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="card-body p-4">
                        <h1 class="card-title text-xl font-semibold text-gray-900">{{ $recipe->title }}</h1>
                        <h1 class="card-text text-gray-600 mt-2">{{ Str::limit($recipe->description, 100) }}</h1>
                        <div class="text-sm text-gray-500 mt-2 flex justify-between">
                            <span><i class="bi bi-heart-fill text-red-500"></i> {{ $recipe->likes->count() }} Likes</span>
                            <span><i class="bi bi-chat-dots-fill text-indigo-500"></i> {{ $recipe->comments->count() }} Comments</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white p-3 flex justify-between border-t border-gray-200">
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-primary flex items-center gap-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger flex items-center gap-1">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


<div class="modal fade" id="recipeModal" tabindex="-1" aria-labelledby="recipeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="recipeModalLabel">Recipe Title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="" alt="" id="modalRecipeImage" class="img-fluid mb-3" style="max-height: 300px; width: 100%; object-fit: cover;">
        <h1 id="modalRecipeDescription"></h1>
        <strong><h6>Ingredients:</h6></strong>
        <ul id="modalRecipeIngredients"></ul>
        <strong><h1>Instructions:</h1></strong>
        <p id="modalRecipeInstructions"></p>
        <p><strong>Category:</strong> <span id="modalRecipeCategory"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<x-footer />


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var recipeModal = document.getElementById('recipeModal');

        recipeModal.addEventListener('show.bs.modal', function (event) {
            var card = event.relatedTarget;

            var title = card.getAttribute('data-title');
            var description = card.getAttribute('data-description');
            var ingredients = card.getAttribute('data-ingredients').split(',');
            var instructions = card.getAttribute('data-instructions');
            var category = card.getAttribute('data-category');
            var image = card.getAttribute('data-image');

            recipeModal.querySelector('.modal-title').textContent = title;
            recipeModal.querySelector('#modalRecipeDescription').textContent = description;
            recipeModal.querySelector('#modalRecipeInstructions').textContent = instructions;
            recipeModal.querySelector('#modalRecipeCategory').textContent = category;

            var imgElem = recipeModal.querySelector('#modalRecipeImage');
            if (image) {
                imgElem.src = image;
                imgElem.style.display = 'block';
            } else {
                imgElem.style.display = 'none';
            }

            var ingredientsList = recipeModal.querySelector('#modalRecipeIngredients');
            ingredientsList.innerHTML = '';
            ingredients.forEach(function (ingredient) {
                var li = document.createElement('li');
                li.textContent = ingredient.trim();
                ingredientsList.appendChild(li);
            });
        });
    });
</script>

@endsection
