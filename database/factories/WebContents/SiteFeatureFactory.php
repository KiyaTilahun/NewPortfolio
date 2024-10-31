<?php

namespace Database\Factories\WebContents;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteFeature>
 */
class SiteFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
            return [
                'name' => $this->faker->unique()->word,
                'title' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
               'data' => [
                [
                    'title' => $this->faker->sentence,
                    'image' => 'images/social-logos/image-5.jpg', // Generating a fake image path
                    'icon' => $this->faker->word,
                    'visibility'=>true,
                    'description' => $this->faker->paragraph,
                    'more' => $this->faker->boolean,
                    'subtitle' => $this->faker->optional()->word,
                    'rating' => $this->faker->numberBetween(0, 5),
                ]
            ],
                'is_visible' => $this->faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
       
    }
}
