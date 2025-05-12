<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function show(Recipe $recipe)
{
    // Optionally eager load the category or comments
    $recipe->load('category');

    return view('recipes.show', compact('recipe'));
}

    // Display all recipes
    public function index()
    {
        $recipes = Recipe::with("user", "category")->paginate(10);
        return view("recipes.index", compact("recipes"));
    }

    // Show form to create a new recipe
    public function create()
    {
        $categories = Category::all();
        return view("recipes.create", compact("categories"));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "ingredients" => "required|string", // assuming comma-separated string from textarea
            "instructions" => "required|string",
            "category_id" => "required|exists:categories,id",
            "image" => "nullable|image|max:2048",
        ]);
    
        $recipe = new Recipe();
        $recipe->user_id = Auth::id();
        $recipe->title = $validated["title"];
        $recipe->description = $validated["description"];
        $recipe->ingredients = array_map("trim", explode(",", $validated["ingredients"])); // Convert to array
        $recipe->instructions = $validated["instructions"];
        $recipe->category_id = $validated["category_id"];
    
        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("recipes", "public");
            $recipe->image = $path;
        }
    
        $recipe->save();
    
        return redirect()->route("dashboard")->with("success", "Recipe created successfully!");
    }

    // // Display a single recipe
    // public function show(Recipe $recipe)
    // {
    //     return view("recipes.show", compact("recipe"));
    // }

    // public function edit(Recipe $recipe)
    // {
    //     // Ensure the user owns the recipe
    //     if ($recipe->user_id !== Auth::id()) {
    //         abort(403, "Unauthorized action.");
    //     }
    
    //     $categories = Category::all();
    
    //     return view("recipes.edit", [
    //         "recipe" => $recipe,
    //         "categories" => $categories,
    //     ]);
    // }

    // Update a recipe
    public function update(Request $request, Recipe $recipe)
    {
        // Ensure the user owns the recipe
        if ($recipe->user_id !== Auth::id()) {
            abort(403, "Unauthorized action.");
        }
    
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "ingredients" => "required|string",
            "instructions" => "required|string",
            "category_id" => "required|exists:categories,id",
            "image" => "nullable|image|max:2048",
        ]);
    
        $recipe->title = $validated["title"];
        $recipe->description = $validated["description"];
        $recipe->ingredients = array_map("trim", explode(",", $validated["ingredients"]));
        $recipe->instructions = $validated["instructions"];
        $recipe->category_id = $validated["category_id"];
    
        if ($request->hasFile("image")) {
            // Delete old image if exists
            if ($recipe->image) {
                Storage::disk("public")->delete($recipe->image);
            }
    
            // Store new image
            $path = $request->file("image")->store("recipes", "public");
            $recipe->image = $path;
        }
    
        $recipe->save();
    
        return redirect()->route("dashboard")->with("success", "Recipe updated successfully!");
    }

    // Delete a recipe
    // public function destroy(Recipe $recipe)
    // {
    //     $this->authorize("delete", $recipe);

    //     if ($recipe->image) {
    //         Storage::disk("public")->delete($recipe->image);
    //     }

    //     $recipe->delete();

    //     return redirect()->route("recipes.index")->with("success", "Recipe deleted successfully!");
    // }
    public function destroy(Recipe $recipe)
{
    // Optional: authorize deletion only by owner
    if (auth()->id() !== $recipe->user_id) {
        abort(403, 'Unauthorized action.');
    }

    // Delete image from storage (if exists)
    if ($recipe->image) {
        Storage::disk('public')->delete($recipe->image);
    }

    $recipe->delete();

    return redirect()->route('dashboard')->with('success', 'Recipe deleted successfully.');
}
}
