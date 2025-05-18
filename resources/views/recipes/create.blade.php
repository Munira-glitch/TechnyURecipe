@extends("layouts.app")

@section("title", "Create Recipe")

@section("content")
<div class="container mt-5 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Add New Recipe</h1>

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-4">
        @csrf

        <div>
            <label for="title" class="form-label font-semibold">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div>
            <label for="description" class="form-label font-semibold">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div>
            <label for="ingredients" class="form-label font-semibold">Ingredients (comma-separated)</label>
            <textarea name="ingredients" id="ingredients" class="form-control" rows="3" required></textarea>
        </div>

        <div>
            <label for="instructions" class="form-label font-semibold">Instructions</label>
            <textarea name="instructions" id="instructions" class="form-control" rows="5" required></textarea>
        </div>

        <div>
    <label for="category_id" class="form-label font-semibold">Category</label>
    <select name="category_id" id="category_id" class="form-select" required>
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
            @php
                $formattedName = ucfirst(strtolower($category->name));
            @endphp
            <option value="{{ $category->id }}">{{ $formattedName }}</option>
        @endforeach
    </select>
</div>


        <div>
            <label for="image" class="form-label font-semibold">Recipe Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save Recipe
            </button>
        </div>
    </form>
</div>
@endsection
