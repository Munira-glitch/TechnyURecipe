<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Random user
            'recipe_id' => Recipe::factory(), // Random recipe
            'comment' => $this->faker->sentence(10), // Random comment
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
