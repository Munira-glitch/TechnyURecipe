@extends("layouts.app")

@section("title", $recipe->title)

@section("content")
    <h1>{{ $recipe->title }}</h1>

    <p><strong>Category:</strong> {{ $recipe->category->name ?? "Uncategorized" }}</p>
    <p><strong>Description:</strong> {{ $recipe->description }}</p>

    <h4>Ingredients:</h4>
    <ul>
        @foreach(json_decode($recipe->ingredients, true) as $ingredient)
            <li>{{ $ingredient }}</li>
        @endforeach
    </ul>

    <h4>Instructions:</h4>
    <p>{{ $recipe->instructions }}</p>

    @if($recipe->image)
        <img src="{{ asset('storage/' . $recipe->image) }}" class="img-fluid mt-3" alt="{{ $recipe->title }}">
    @endif

    <hr>

    <!-- Like/Unlike Form -->
    <div class="mb-3">
        @if($recipe->isLikedBy(auth()->user()))
            <form action="{{ route('recipes.unlike', $recipe) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Unlike ({{ $recipe->likes->count() }})</button>
            </form>
        @else
            <form action="{{ route('recipes.like', $recipe) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Like ({{ $recipe->likes->count() }})</button>
            </form>
        @endif
    </div>

    <!-- Comments Section -->
    <h4>Comments ({{ $recipe->comments->count() }})</h4>

    @auth
        <form action="{{ route('recipes.comment', $recipe) }}" method="POST" class="mb-3">
            @csrf
            <textarea name="comment" class="form-control" rows="3" placeholder="Add a comment..." required></textarea>
            <button type="submit" class="btn btn-secondary mt-2">Post Comment</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> to add a comment.</p>
    @endauth

    @forelse($recipe->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <p>{{ $comment->comment }}</p>
                <small>By {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse

    <a href="{{ route('recipes.index') }}" class="btn btn-secondary mt-4">Back to Recipes</a>
@endsection
