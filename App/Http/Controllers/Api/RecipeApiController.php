<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RecipeApiController extends Controller
{
    public function search($query)
    {
        $response = Http::get("https://www.themealdb.com/api/json/v1/1/search.php", [
            's' => $query
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Failed to fetch recipes'], 500);
    }

    public function categories()
    {
        $response = Http::get("https://www.themealdb.com/api/json/v1/1/categories.php");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Failed to fetch categories'], 500);
    }
}
