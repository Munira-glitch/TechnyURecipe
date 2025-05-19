<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = Category::paginate(10);
        return view("categories.index", compact("categories"));
    }

    // Show form to create a new category
    public function create()
    {
        return view("categories.create");
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100|unique:categories,name",
        ]);

        Category::create($request->only("name"));

        return redirect()->route("categories.index")->with("success", "Category created successfully!");
    }

    // Display a single category and its recipes
    public function show($categorySlug)
    {
        // Find the category by name (case insensitive)
        $category = Category::whereRaw('LOWER(name) = ?', [strtolower($categorySlug)])->firstOrFail();

        // Load recipes in that category (with user and category eager loaded), paginate if you want
        $recipes = $category->recipes()->with('user', 'category')->paginate(10);

        // Return to your explore or category view passing the category and its recipes
        return view('categories.show', compact('category', 'recipes'));
    }

    // Show form to edit a category
    public function edit(Category $category)
    {
        return view("categories.edit", compact("category"));
    }

    // Update a category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => "required|string|max:100|unique:categories,name," . $category->id,
        ]);

        $category->update($request->only("name"));

        return redirect()->route("categories.index")->with("success", "Category updated successfully!");
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("categories.index")->with("success", "Category deleted successfully!");
    }
}
