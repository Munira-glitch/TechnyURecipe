<?php
use App\Http\Controllers\Api\RecipeApiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Welcome Page (Publicly accessible)
Route::get("/", [WelcomeController::class, "index"])->name("welcome");

// Dashboard - Only accessible to authenticated and verified users
Route::get("/dashboard", [DashboardController::class, "index"])
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Authentication Middleware - Routes only accessible by logged-in users
Route::middleware(["auth"])->group(function () {
    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get("/profile", "edit")->name("profile.edit");
        Route::patch("/profile", "update")->name("profile.update");
        Route::delete("/profile", "destroy")->name("profile.destroy");
    });
    

    // Recipe Routes (CRUD)
    Route::resource("recipes", RecipeController::class);
    Route::view('/recipe-search', 'recipes.search');


    // Category Routes (CRUD)
    Route::resource("categories", CategoryController::class);

    // Like and Unlike Routes
    Route::post("recipes/{recipe}/like", [LikeController::class, "store"])->name("recipes.like");
    Route::delete("recipes/{recipe}/like", [LikeController::class, "destroy"])->name("recipes.unlike");

    // Comment Routes
    Route::post("recipes/{recipe}/comment", [CommentController::class, "store"])->name("recipes.comment");
    
    //API Routes
    Route::get("/recipes/search/{query}", [RecipeApiController::class, 'search']);
    Route::get("/recipes/categories", [RecipeApiController::class, 'categories']);
    

});

require __DIR__ . "/auth.php";
