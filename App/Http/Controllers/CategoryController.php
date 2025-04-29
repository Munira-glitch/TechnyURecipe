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
    public function show(Category $category)
    {
        $recipes = $category->recipes()->paginate(10);
        return view("categories.show", compact("category", "recipes"));
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
