<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'ingredients' => json_encode([
                ['name' => 'Flour', 'quantity' => '2 cups'],
                ['name' => 'Sugar', 'quantity' => '1 cup']
            ]),
            'instructions' => $this->faker->text(300),
            'image' => 'images/default.png'
        ];
    }
}
