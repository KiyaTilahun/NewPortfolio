<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Category>
 */
class CategoryFactory extends Factory
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

            'title' => $this->faker->word,
            'slug' => Str::slug($this->faker->word),
            'content' => $this->faker->sentence,
            'bg_color' => $this->faker->safeHexColor,
            'text_color' => $this->faker->safeHexColor,
            'meta_description' => $this->faker->sentence,
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
