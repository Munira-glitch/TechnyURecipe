<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Recipe;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // User-created recipes with pagination (12 per page)
        $userRecipes = Recipe::with('likes', 'comments')
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%");
            })
            ->latest()
            ->paginate(12);

        // Recipes from Spoonacular API (12 total)
        $apiKey = env('SPOONACULAR_API_KEY');

        $endpoint = $query
            ? "https://api.spoonacular.com/recipes/complexSearch?query=" . urlencode($query) . "&number=12&addRecipeInformation=true&apiKey=$apiKey"
            : "https://api.spoonacular.com/recipes/random?number=12&apiKey=$apiKey";

        $response = Http::get($endpoint);

        $externalRecipes = $response->successful()
            ? ($response['results'] ?? $response['recipes'] ?? [])
            : [];

        return view('recipes.explore', compact('userRecipes', 'externalRecipes'));
    }
}
