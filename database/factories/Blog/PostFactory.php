<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
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
            //

            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'thumbnail' => null, 
            'body' => $this->faker->paragraphs(3, true),
            'is_featured' => $this->faker->boolean,
            'is_published' => $this->faker->boolean(true),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
