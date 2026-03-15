<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

        // Retornamos la vista del post
        return view('blog.view', compact('post'));
    }
}
