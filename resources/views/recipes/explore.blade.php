@extends('layouts.app')

@section('title', 'Explore Recipes')

@section('content')
<div class="container mt-5">
    <x-navbar />

    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Recipe Explorer</a>
            <form class="d-flex ms-auto" method="GET" action="{{ route('recipes.explore') }}">
                <input class="form-control me-2" type="search" placeholder="Search recipes..." name="query" value="{{ request('query') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <h2 class="text-3xl font-bold mb-4">Explore Recipes</h2>

    <div class="mb-5">
        <h4 class="text-xl font-semibold text-gray-700 mb-3">TechnyURecipe Recipes</h4>
        <div class="row">
        @foreach($userRecipes as $recipe)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
            </div>

            <div class="card-footer bg-light p-2 border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-heart-fill text-danger"></i> {{ $recipe->likes->count() }} Likes</span>
                    <span><i class="bi bi-chat-dots-fill text-primary"></i> {{ $recipe->comments->count() }} Comments</span>
                </div>

                @auth
                    <!-- Like Button -->
                    <form action="{{ route('recipes.like', $recipe) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Like</button>
                    </form>

                    <!-- Comment Form -->
                    <form action="{{ route('comments.store', $recipe->id) }}" method="POST" class="mt-2">
                        @csrf
                        <input type="text" name="comment" class="form-control" placeholder="Leave a comment..." required>
                        <button type="submit" class="btn btn-sm btn-outline-primary mt-1">Comment</button>
                    </form>
                @else
                    <p class="text-muted mt-2">Login to like or comment.</p>
                @endauth
            </div>
        </div>
    </div>
@endforeach

    </div>

    <hr class="my-5">

    <div>
        <h4 class="text-xl font-semibold text-gray-700 mb-3">More Recipes</h4>
        <div class="row">
            @forelse($externalRecipes as $meal)
                <div class="col-md-4 mb-4">
                    <div class="card h-100" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#mealModal{{ $meal['id'] }}">
                        <img src="{{ $meal['image'] }}" class="card-img-top" alt="{{ $meal['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $meal['title'] }}</h5>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="mealModal{{ $meal['id'] }}" tabindex="-1" aria-labelledby="mealModalLabel{{ $meal['id'] }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mealModalLabel{{ $meal['id'] }}">{{ $meal['title'] }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ $meal['image'] }}" class="img-fluid mb-3" alt="{{ $meal['title'] }}">
                                    <p><strong>Servings:</strong> {{ $meal['servings'] }}</p>
                                    <p><strong>Ready in:</strong> {{ $meal['readyInMinutes'] }} minutes</p>
                                    @if(isset($meal['summary']))
                                        <p><strong>Summary:</strong> {!! strip_tags($meal['summary']) !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No external recipes found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
