<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\User;
use Database\Factories\ArticlesFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::factory(4)->create();

    //    User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
        Categories::create([
            "name" => "Wisata",
            "user_id" => "1"
        ]);
        Categories::create([
            "name" => "Olahraga",
            "user_id" => "1"
        ]);
        Categories::create([
            "name" => "Tokoh",
            "user_id" => "3"
        ]);
        Categories::create([
            "name" => "Opini",
            "user_id" => "2"
        ]);
        
        Articles::factory(10)->create();
    }
}
