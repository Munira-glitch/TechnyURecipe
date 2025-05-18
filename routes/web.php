<?php

use App\Http\Controllers\Api\RecipeApiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExploreController;


// Welcome Page 
Route::get("/", [WelcomeController::class, "index"])->name("welcome");


// About Page 
Route::view("/about", "about")->name("about");


// Dashboard - Only accessible to authenticated and verified users
Route::get("/dashboard", [DashboardController::class, "index"])
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Authentication Middleware - Routes only accessible by logged-in users
Route::middleware(["auth"])->group(function () {

    // Recipe Routes (CRUD)
    Route::resource("recipes", RecipeController::class);
    Route::view('/recipe-search', 'recipes.search');


    // Category Routes (CRUD)
    Route::resource("categories", CategoryController::class);
    //Like and comment 
        Route::post('/recipes/{recipe}/like', [RecipeController::class, 'like'])->name('recipes.like');
        // Route::post('/recipes/{recipe}/comment', [RecipeController::class, 'comment'])->name('recipes.comment');
        Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->name('comments.store');

        //edit recipe
        Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');

        

    
    
    //API Routes
    Route::get("/recipes/search/{query}", [RecipeApiController::class, 'search']);
    Route::get("/recipes/categories", [RecipeApiController::class, 'categories']);

    //Explore controller
    Route::get("/explore", [ExploreController::class, "index"])->name("recipes.explore");
    

});

require __DIR__ . "/auth.php";
