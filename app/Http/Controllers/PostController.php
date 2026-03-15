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
}
