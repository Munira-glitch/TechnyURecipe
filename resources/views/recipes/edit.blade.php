@extends("layouts.app")

@section("title", "Edit Recipe")

@section("content")
<div class="container mt-5 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Edit Recipe</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-4">
        @csrf
        @method("PUT")

        <div class="mb-4">
            <label class="form-label font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $recipe->title) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label font-semibold">Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $recipe->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label font-semibold">Ingredients (comma-separated)</label>
            <input type="text" name="ingredients" value="{{ old('ingredients', implode(', ', $recipe->ingredients)) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label font-semibold">Instructions</label>
            <textarea name="instructions" class="form-control" rows="5" required>{{ old('instructions', $recipe->instructions) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label font-semibold">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $recipe->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label font-semibold">Recipe Image</label>
            <input type="file" name="image" class="form-control">
            @if ($recipe->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="Current Image" class="w-32 h-32 object-cover border rounded">
                </div>
            @endif
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update Recipe
            </button>
        </div>
    </form>
</div>
@endsection
