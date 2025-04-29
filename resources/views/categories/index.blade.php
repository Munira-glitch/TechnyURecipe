@extends("layouts.app")

@section("title", "All Recipes")

@section("content")
    <h1 class="mb-4">Recipes</h1>

    <a href="{{ route('recipes.create') }}" class="btn btn-primary mb-3">Create New Recipe</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>
                        <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->title }}</a>
                    </td>
                    <td>{{ $recipe->category->name ?? "Uncategorized" }}</td>
                    <td>{{ $recipe->user->name }}</td>
                    <td>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No recipes available.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $recipes->links() }}
@endsection
