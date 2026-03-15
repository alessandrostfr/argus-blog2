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
        | Este usuario servirá para acceder al panel de administración.
        */

        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@argusblog.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | 2. CREAR USUARIO EDITOR
        |--------------------------------------------------------------------------
        | Creamos un usuario editor que podrá gestionar posts
        | pero no tendrá permisos completos como el admin.
        */

        $editor = User::create([
            'name' => 'Editor Principal',
            'email' => 'editor@argusblog.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'editor',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | 3. CREAR USUARIOS NORMALES
        |--------------------------------------------------------------------------
        | Generamos 3 usuarios adicionales usando factories.
        */

        $users = User::factory(3)->create([
            'role' => 'user',
        ]);


        /*
        |--------------------------------------------------------------------------
        | 4. AGRUPAR TODOS LOS USUARIOS
        |--------------------------------------------------------------------------
        | Unimos admin, editor y users en una colección para poder
        | asignarlos aleatoriamente como autores de posts.
        */

        $allUsers = collect([$admin, $editor])->merge($users);


        /*
        |--------------------------------------------------------------------------
        | 5. CREAR CATEGORÍAS
        |--------------------------------------------------------------------------
        | Generamos 5 categorías para clasificar los posts.
        */

        $categories = Category::factory(5)->create();


        /*
        |--------------------------------------------------------------------------
        | 6. CREAR TAGS
        |--------------------------------------------------------------------------
        | Generamos 5 etiquetas que se usarán para clasificar
        | los posts con mayor detalle.
        */

        $tags = Tag::factory(5)->create();


        /*
        |--------------------------------------------------------------------------
        | 7. CREAR POSTS
        |--------------------------------------------------------------------------
        | Generamos 50 posts usando la factory.
        | Cada post tendrá:
        | - autor aleatorio
        | - título
        | - slug
        | - contenido
        | - resumen
        */

        Post::factory(50)->create([
            'user_id' => $allUsers->random()->id
        ])
        ->each(function ($post) use ($tags, $categories) {

            /*
            --------------------------------------------------------------
            | 8. ASIGNAR TAGS AL POST
            --------------------------------------------------------------
            | Cada post tendrá entre 1 y 3 tags.
            | Esto llena automáticamente la tabla post_tag.
            */

            $post->tags()->attach(
                $tags->random(rand(1,3))->pluck('id')
            );


            /*
            --------------------------------------------------------------
            | 9. ASIGNAR CATEGORÍAS AL POST
            --------------------------------------------------------------
            | Cada post tendrá entre 1 y 2 categorías.
            | Esto llena automáticamente la tabla post_categories.
            */

            $post->categories()->attach(
                $categories->random(rand(1,2))->pluck('id')
            );


            /*
            --------------------------------------------------------------
            | 10. CREAR MEDIA PARA EL POST
            --------------------------------------------------------------
            | Generamos entre 1 y 3 archivos media para cada post.
            | Esto puede representar imágenes, videos o documentos.
            */

            Media::factory(rand(1,3))->create([
                'post_id' => $post->id
            ]);

        });

    }
}
