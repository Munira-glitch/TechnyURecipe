<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create specific categories
        $categories = ['Breakfast', 'Lunch', 'Dinner', 'Dessert'];
        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }

        // Create users and their recipes
        User::factory(10) // Create 10 users
            ->has(Recipe::factory()->count(5)) 
            ->create();

        // Create likes and comments
        Like::factory(30)->create(); 
        Comment::factory(50)->create(); 
    }
}
