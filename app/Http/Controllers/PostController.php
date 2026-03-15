<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Obtenemos los últimos 4 posts publicados
        // Cargamos también el autor y las categorías para evitar consultas N+1
         $latestPosts = Post::with(['user', 'categories'])
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        // Retornamos la vista welcome con los posts
        return view('welcome', compact('latestPosts'));
    }

    public function show(string $slug)
    {
        // Buscamos el post publicado por slug
        $post = Post::with(['user', 'categories', 'tags'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Retornamos la vista del detalle
        return view('posts.show', compact('post'));
    }
}
