<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Random user
            'recipe_id' => Recipe::factory(), // Random recipe
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
