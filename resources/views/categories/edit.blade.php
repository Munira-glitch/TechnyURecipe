@extends("layouts.app")

@section("title", "Edit Recipe")

@section("content")
    <h1>Edit Recipe</h1>

    <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $recipe->title) }}" required>
            @error("title") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $recipe->description) }}</textarea>
            @error("description") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Ingredients -->
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients (Comma-separated):</label>
            <input type="text" name="ingredients[]" class="form-control"
                value="{{ implode(', ', json_decode($recipe->ingredients, true)) }}" required>
            @error("ingredients") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Instructions -->
        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions:</label>
            <textarea name="instructions" id="instructions" class="form-control" required>{{ old('instructions', $recipe->instructions) }}</textarea>
            @error("instructions") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error("category_id") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image (Optional):</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" class="mt-2" width="150">
            @endif
            @error("image") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Recipe</button>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to Recipes</a>
    </form>
@endsection
