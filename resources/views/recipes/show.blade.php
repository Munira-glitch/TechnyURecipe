@extends("layouts.app")

@section("title", $recipe->title)

@section("content")
<div class="container mt-5 max-w-4xl mx-auto">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $recipe->title }}</h1>

        @if ($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-64 object-cover rounded mb-4">
        @endif

        <div class="mb-4 text-sm text-gray-500">
            <span><strong>Category:</strong> {{ $recipe->category->name ?? 'Uncategorized' }}</span>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Description</h2>
            <p class="text-gray-800">{{ $recipe->description }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Ingredients</h2>
            <ul class="list-disc list-inside text-gray-800">
                @foreach (explode(',', $recipe->ingredients) as $ingredient)
                    <li>{{ trim($ingredient) }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Instructions</h2>
            <p class="text-gray-800 whitespace-pre-line">{{ $recipe->instructions }}</p>
        </div>

        <div class="flex gap-2 mt-6">
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-primary">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
