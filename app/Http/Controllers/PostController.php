<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function index()
    {
        // Obtenemos los últimos 4 posts publicados para el slider
        $latestPosts = Post::with(['user', 'categories'])
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        // Guardamos los IDs de los posts del slider para no repetirlos abajo
        $latestPostIds = $latestPosts->pluck('id');

        // Obtenemos el resto de posts publicados para el grid
        // Paginamos de 9 en 9
        $posts = Post::with(['user', 'categories'])
            ->where('status', 'published')
            ->whereNotIn('id', $latestPostIds)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(9);

        // Retornamos la vista welcome con ambas variables
        return view('welcome', compact('latestPosts', 'posts'));
    }

    /**
     * Mostrar un post en detalle
     */
    public function show($id, $slug)
    {
        // Buscamos el post por id
        $post = Post::with(['user', 'categories', 'tags'])
            ->where('id', $id)
            ->where('status', 'published')
            ->firstOrFail();

        // Verificamos que el slug coincida
        // Esto evita problemas de SEO o URLs incorrectas
        if ($post->slug !== $slug) {
            return redirect()->route('posts.show', [
                'id' => $post->id,
                'slug' => $post->slug
            ]);
        }

        $latestSidebarPosts = Post::where('status', 'published')
            ->where('id', '!=', $post->id) // evitamos mostrar el mismo post
            ->latest('published_at')
            ->take(4)
            ->get();

        // Categorías con contador de posts publicados
        $categories = Category::withCount([
            'posts as published_posts_count' => function ($query) {
                $query->where('status', 'published');
            }
        ])
            ->orderByDesc('published_posts_count')
            ->get();


        // Post anterior
        $previousPost = Post::where('status', 'published')
            ->where('id', '<', $post->id)
            ->orderByDesc('id')
            ->first();

        // Post siguiente
        $nextPost = Post::where('status', 'published')
            ->where('id', '>', $post->id)
            ->orderBy('id')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | TAGS PARA EL SIDEBAR
        |--------------------------------------------------------------------------
        | Obtenemos los tags con número de posts publicados
        */

        $tags = Tag::withCount([
            'posts as published_posts_count' => function ($query) {
                $query->where('status', 'published');
            }
        ])
            ->having('published_posts_count', '>', 0)
            ->orderByDesc('published_posts_count')
            ->take(20) // límite opcional
            ->get();

        // Retornamos la vista
        return view('blog.view', compact(
            'post',
            'latestSidebarPosts',
            'categories',
            'previousPost',
            'nextPost',
            'tags'
        ));
    }
}
