<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
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

    // Store a new recipe
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required",
            "ingredients" => "required|array",
            "instructions" => "required",
            "category_id" => "nullable|exists:categories,id",
            "image" => "nullable|image|max:2048",
        ]);

        $data = $request->all();
        $data["user_id"] = Auth::id();
        $data["ingredients"] = json_encode($request->ingredients);

        if ($request->hasFile("image")) {
            $data["image"] = $request->file("image")->store("images", "public");
        }

        Recipe::create($data);

        return redirect()->route("recipes.index")->with("success", "Recipe created successfully!");
    }

    // Display a single recipe
    public function show(Recipe $recipe)
    {
        return view("recipes.show", compact("recipe"));
    }

    // Show edit form
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view("recipes.edit", compact("recipe", "categories"));
    }

    // Update a recipe
    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize("update", $recipe);

        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required",
            "ingredients" => "required|array",
            "instructions" => "required",
            "category_id" => "nullable|exists:categories,id",
            "image" => "nullable|image|max:2048",
        ]);

        $data = $request->all();
        $data["ingredients"] = json_encode($request->ingredients);

        if ($request->hasFile("image")) {
            Storage::disk("public")->delete($recipe->image);
            $data["image"] = $request->file("image")->store("images", "public");
        }

        $recipe->update($data);

        return redirect()->route("recipes.index")->with("success", "Recipe updated successfully!");
    }

    // Delete a recipe
    public function destroy(Recipe $recipe)
    {
        $this->authorize("delete", $recipe);

        if ($recipe->image) {
            Storage::disk("public")->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route("recipes.index")->with("success", "Recipe deleted successfully!");
    }
}
