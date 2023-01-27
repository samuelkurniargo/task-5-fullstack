<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "category_id" => rand(1, 4),
            "title" => fake()->sentence(3),
            "content" => fake()->paragraphs(5, true),
            "image" => fake()->sentence(3),
            "user_id" => rand(1, 4)
        ];
    }
}
