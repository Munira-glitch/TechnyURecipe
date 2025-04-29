<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store a comment
    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            "comment" => "required|string|max:500",
        ]);

        Comment::create([
            "user_id" => Auth::id(),
            "recipe_id" => $recipe->id,
            "comment" => $request->comment,
        ]);

        return back()->with("success", "Comment added!");
    }
}
