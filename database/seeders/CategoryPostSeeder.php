<?php

namespace Database\Seeders;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Category::all()->each(function ($category) {
            $category->posts()->attach(
                Post::factory()->count(2)->create()->pluck('id')->toArray()
            );
        });
    }
}
