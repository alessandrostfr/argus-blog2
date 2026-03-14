<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@argusblog.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory(4)->create();

        Category::factory(5)->create();

        Tag::factory(5)->create();

        Post::factory(50)->create()->each(function ($post) {
            $post->tags()->attach(
                Tag::inRandomOrder()->take(rand(1, 3))->pluck('id')
            );

            $post->categories()->attach(
                Category::inRandomOrder()->take(rand(1, 2))->pluck('id')
            );
        });
    }
}
