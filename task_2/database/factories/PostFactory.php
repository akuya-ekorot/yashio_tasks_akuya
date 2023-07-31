<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'category_id' => Category::factory(),
            'slug' => $this->faker->slug,
            'excerpt' => $this->faker->paragraph,
            'body' => $this->faker->paragraph(10),
        ];
    }
}
