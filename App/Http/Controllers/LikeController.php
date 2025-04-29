<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Store a like
    public function store(Recipe $recipe)
    {
        if (!$recipe->isLikedBy(Auth::user())) {
            Like::create([
                "user_id" => Auth::id(),
                "recipe_id" => $recipe->id,
            ]);
        }

        return back()->with("success", "You liked this recipe!");
    }

    // Remove a like
    public function destroy(Recipe $recipe)
    {
        $recipe->likes()->where("user_id", Auth::id())->delete();
        return back()->with("success", "You unliked this recipe!");
    }
}
