<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [

            /*
        |--------------------------------------------------------------------------
        | Datos básicos del usuario
        |--------------------------------------------------------------------------
        */

            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),

            /*
        |--------------------------------------------------------------------------
        | Perfil del autor
        |--------------------------------------------------------------------------
        | Estos campos se usarán en la página del autor o en
        | el bloque de autor debajo del post.
        */

            'descripcion' => fake()->paragraph(2),

            'urlfacebook' => fake()->optional()->url(),
            'urlinstagram' => fake()->optional()->url(),
            'urlyoutube' => fake()->optional()->url(),

            /*
        |--------------------------------------------------------------------------
        | Seguridad
        |--------------------------------------------------------------------------
        */

            'password' => Hash::make('password'),

            /*
        |--------------------------------------------------------------------------
        | Rol del usuario
        |--------------------------------------------------------------------------
        | De momento generamos solo usuarios normales.
        */

            'role' => fake()->randomElement(['user']),

            'remember_token' => Str::random(10),

            /*
        |--------------------------------------------------------------------------
        | Fechas
        |--------------------------------------------------------------------------
        */

            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
