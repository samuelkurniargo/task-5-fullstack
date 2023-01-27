<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articles::factory(10)->create([
            "category_id" => rand(1,4),
            "title" => fake()-> sentence(3),
            "content" => fake()->paragraphs(5, true),
            "image" => fake()-> sentence(3),
            "user_id" => rand(1,4)
        ]);
    }
}
