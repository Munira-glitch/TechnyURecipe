@extends('layouts.app')

@section('title', 'Explore Recipes')

@section('content')
<div class="container mt-5">
    <x-explorenavbar />

    <h2 class="fs-2 fw-bold mb-4">Explore Recipes</h2>
    <section class="mb-5">
        <h4 class="fs-4 fw-semibold text-secondary mb-3">TechnyURecipe Recipes</h4>
        <div class="row">
            @foreach($userRecipes as $recipe)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="cursor:pointer; max-height: 320px;" data-bs-toggle="modal" data-bs-target="#userRecipeModal{{ $recipe->id }}">
                        @if($recipe->image)
                            <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $recipe->title }}">
                        @endif
                        <div class="card-body py-2" style="min-height: 100px;">
                            <h6 class="card-title mb-1 fw-bold text-truncate">{{ $recipe->title }}</h6>
                            <p class="card-text text-muted small" style="max-height: 45px; overflow: hidden;">{{ Str::limit($recipe->description, 70) }}</p>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-between align-items-center small">
                            @auth
                                <form action="{{ route('recipes.like', $recipe) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="btn p-0 border-0 bg-transparent">
                                        <i class="bi bi-heart-fill text-danger"></i> {{ $recipe->likes->count() }}
                                    </button>
                                </form>
                            @else
                                <span><i class="bi bi-heart-fill text-danger"></i> {{ $recipe->likes->count() }}</span>
                            @endauth
                            <span><i class="bi bi-chat-dots-fill text-primary"></i> {{ $recipe->comments->count() }}</span>
                        </div>
                    </div>

                    <div class="modal fade" id="userRecipeModal{{ $recipe->id }}" tabindex="-1" aria-labelledby="userRecipeModalLabel{{ $recipe->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $recipe->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @if($recipe->image)
                                        <img src="{{ asset('storage/' . $recipe->image) }}" class="img-fluid rounded mb-3" alt="{{ $recipe->title }}">
                                    @endif

                                    @auth
                                        <form action="{{ route('recipes.like', $recipe) }}" method="POST" class="mb-3">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-heart-fill"></i> Like ({{ $recipe->likes->count() }})
                                            </button>
                                        </form>
                                    @endauth

                                    <p><strong>Description:</strong> {{ $recipe->description }}</p>
                                    <p><strong>Ingredients:</strong> {{ is_array($recipe->ingredients) ? implode(', ', $recipe->ingredients) : $recipe->ingredients }}</p>
                                    <p><strong>Instructions:</strong> {!! nl2br(e($recipe->instructions)) !!}</p>

                                    <hr>
                                    <h6 class="fw-bold mb-2">Comments ({{ $recipe->comments->count() }}):</h6>
                                    <div class="mb-3" style="max-height: 200px; overflow-y: auto;">
                                        @forelse($recipe->comments as $comment)
                                            <div class="mb-2">
                                                <strong>{{ $comment->user->name ?? 'Anonymous' }}:</strong>
                                                <span>{{ $comment->comment }}</span>
                                            </div>
                                        @empty
                                            <p class="text-muted">No comments yet.</p>
                                        @endforelse
                                    </div>

                                    @auth
                                        <form action="{{ route('comments.store', $recipe->id) }}" method="POST" class="mt-3">
                                            @csrf
                                            <div class="mb-2">
                                                <input type="text" name="comment" class="form-control" placeholder="Leave a comment..." required>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-outline-primary">Post Comment</button>
                                        </form>
                                    @else
                                        <p class="text-muted mt-3">Please <a href="{{ route('login') }}">login</a> to comment.</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $userRecipes->links() }}
    </section>

    <section>
        <h4 class="fs-4 fw-semibold text-secondary mb-3">More Recipes</h4>
        <div class="row">
            @forelse($externalRecipes as $meal)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#mealModal{{ $meal['id'] }}">
                        <img src="{{ $meal['image'] }}" class="card-img-top" alt="{{ $meal['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $meal['title'] }}</h5>
                        </div>
                    </div>

                    <div class="modal fade" id="mealModal{{ $meal['id'] }}" tabindex="-1" aria-labelledby="mealModalLabel{{ $meal['id'] }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mealModalLabel{{ $meal['id'] }}">{{ $meal['title'] }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ $meal['image'] }}" class="img-fluid mb-3" alt="{{ $meal['title'] }}">
                                    <p><strong>Servings:</strong> {{ $meal['servings'] ?? 'N/A' }}</p>
                                    <p><strong>Ready in:</strong> {{ $meal['readyInMinutes'] ?? 'N/A' }} minutes</p>
                                    @if(isset($meal['summary']))
                                        <p><strong>Summary:</strong> {!! strip_tags($meal['summary']) !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No recipes found.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
