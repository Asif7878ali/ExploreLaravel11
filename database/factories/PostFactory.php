<?php

namespace Database\Factories;

use App\Models\User;
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
            'post_image' => $this->faker->imageUrl(640, 480, 'posts', true, 'Faker_Image'),
            'title' => $this->faker->realTextBetween($minNbChars = 10, $maxNbChars = 20),
            'description' => $this->faker->realTextBetween($minNbChars = 50, $maxNbChars = 200, $indexSize = 2),
            'viewable' => $this->faker->boolean(),
            'person_who_create' => User::factory()
        ];
    }
}
