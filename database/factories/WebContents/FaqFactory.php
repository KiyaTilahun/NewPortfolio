<?php

namespace Database\Factories\WebContents;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebContents\Faq>
 */
class FaqFactory extends Factory
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

            'question' => $this->faker->sentence(),   
            'answer'   => $this->faker->paragraph(),  
        ];
    }
}
