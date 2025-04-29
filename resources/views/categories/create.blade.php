@extends("layouts.app")

@section("title", "Create Recipe")

@section("content")
    <h1>Create Recipe</h1>

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error("title") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            @error("description") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients (Comma-separated):</label>
            <input type="text" name="ingredients[]" class="form-control" placeholder="Example: Flour, Eggs, Sugar" required>
            @error("ingredients") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions:</label>
            <textarea name="instructions" id="instructions" class="form-control" required>{{ old('instructions') }}</textarea>
            @error("instructions") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error("category_id") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (Optional):</label>
            <input type="file" name="image" id="image" class="form-control">
            @error("image") <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Recipe</button>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to Recipes</a>
    </form>
@endsection
