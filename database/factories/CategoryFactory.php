<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(), // Example: 'Lunch', 'Dessert'
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
