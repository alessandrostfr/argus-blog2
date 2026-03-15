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
        // Generamos una fecha aleatoria para created_at y updated_at
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        // Generamos un tipo de archivo aleatorio
        $fileType = fake()->randomElement(['image', 'video', 'document']);

        /*
        |--------------------------------------------------------------------------
        | Generar una ruta ficticia según el tipo de archivo
        |--------------------------------------------------------------------------
        | Esto nos permite guardar un file_path coherente con el file_type.
        */
        $filePath = match ($fileType) {
            'image'    => 'media/images/' . fake()->uuid() . '.jpg',
            'video'    => 'media/videos/' . fake()->uuid() . '.mp4',
            'document' => 'media/documents/' . fake()->uuid() . '.pdf',
        };

        return [
            // Relación con un post aleatorio
            'post_id' => Post::inRandomOrder()->first()->id ?? Post::factory(),

            // Tipo de archivo
            'file_type' => $fileType,

            // Ruta ficticia del archivo
            'file_path' => $filePath,

            // Fechas de creación y actualización
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
