<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Media;

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

        /*
        |--------------------------------------------------------------------------
        | 1. CREAR USUARIO ADMIN
        |--------------------------------------------------------------------------
        | Creamos manualmente un usuario administrador del sistema.
        */

        $admin = User::updateOrCreate(
            [
                'email' => 'admin@argusblog.com',
            ],
            [
                'name' => 'Administrador',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | 2. CREAR USUARIOS NORMALES
        |--------------------------------------------------------------------------
        */

        $users = User::factory(10)->create([
            'role' => 'user',
        ]);


        /*
        |--------------------------------------------------------------------------
        | 3. AGRUPAR TODOS LOS USUARIOS
        |--------------------------------------------------------------------------
        */

        $allUsers = collect([$admin])->merge($users);


        /*
        |--------------------------------------------------------------------------
        | 4. CREAR CATEGORÍAS
        |--------------------------------------------------------------------------
        */

        $categories = Category::factory(10)->create();


        /*
        |--------------------------------------------------------------------------
        | 5. CREAR TAGS
        |--------------------------------------------------------------------------
        */

        $tags = Tag::factory(10)->create();


        /*
        |--------------------------------------------------------------------------
        | 6. IMÁGENES DE PRUEBA
        |--------------------------------------------------------------------------
        | Estas imágenes existen en:
        | storage/app/public/blog
        */

        $images = [
            'blog/1.jpg',
            'blog/2.jpg',
            'blog/3.jpg',
            'blog/4.jpg',
            'blog/5.jpg',
            'blog/6.jpg',
            'blog/7.jpg',
            'blog/8.jpg',
            'blog/9.jpg',
            'blog/10.jpg',
            'blog/11.jpg',
            'blog/12.jpg',
        ];


        /*
        |--------------------------------------------------------------------------
        | 7. CREAR POSTS
        |--------------------------------------------------------------------------
        */

        Post::factory(200)
            ->make()
            ->each(function ($post) use ($allUsers, $tags, $categories, $images) {

                /*
                --------------------------------------------------------------
                | ASIGNAR AUTOR ALEATORIO
                --------------------------------------------------------------
                */

                $post->user_id = $allUsers->random()->id;


                /*
                --------------------------------------------------------------
                | ASIGNAR IMAGEN DESTACADA ALEATORIA
                --------------------------------------------------------------
                */

                $post->featured_image = collect($images)->random();


                /*
                --------------------------------------------------------------
                | GUARDAR POST
                --------------------------------------------------------------
                */

                $post->save();


                /*
                --------------------------------------------------------------
                | ASIGNAR TAGS
                --------------------------------------------------------------
                */

                $post->tags()->attach(
                    $tags->random(rand(1, 3))->pluck('id')
                );


                /*
                --------------------------------------------------------------
                | ASIGNAR CATEGORÍAS
                --------------------------------------------------------------
                */

                $post->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')
                );


                /*
                --------------------------------------------------------------
                | CREAR MEDIA PARA EL POST
                --------------------------------------------------------------
                */

                Media::factory(rand(1, 3))->create([
                    'post_id' => $post->id
                ]);
            });
    }
}
