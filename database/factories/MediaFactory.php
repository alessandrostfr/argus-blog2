<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'post_id' => Post::inRandomOrder()->first()->id ?? Post::factory(),
            'file_type' => fake()->randomElement(['image', 'video', 'document']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
