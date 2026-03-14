<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->sentence(6);
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(6, true),
            'summary' => fake()->sentence(20),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
            'featured_image' => fake()->imageUrl(800, 400, 'technology'),
            'published_at' => fake()->boolean(70) ? fake()->dateTimeBetween($createdAt, 'now') : null,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
