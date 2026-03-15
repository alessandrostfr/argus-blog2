<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Información general del blog
    |--------------------------------------------------------------------------
    */

    'name' => env('BLOG_NAME', 'ArgusBlog'),

    'description' => env(
        'BLOG_DESCRIPTION',
        'Blog sobre tecnología,programación y desarrollo web'
    ),

    'author' => env('BLOG_AUTHOR', 'ArgusBlog'),

    /*
    |--------------------------------------------------------------------------
    | Configuración de posts
    |--------------------------------------------------------------------------
    */

    'posts_per_page' => env('BLOG_POSTS_PER_PAGE', 9),

    'slider_posts_count' => env('BLOG_SLIDER_POSTS_COUNT', 4),

    'latest_posts_count' => env('BLOG_LATEST_POSTS_COUNT', 4),

    '404_recent_posts_count' => env('BLOG_404_RECENT_POSTS_COUNT', 3),

    /*
    |--------------------------------------------------------------------------
    | Imágenes por defecto
    |--------------------------------------------------------------------------
    */

    'default_post_image' => env('BLOG_DEFAULT_POST_IMAGE', 'assets/img/blog/1.jpg'),

    'default_author_image' => env('BLOG_DEFAULT_AUTHOR_IMAGE', 'assets/img/author/1.jpg'),

    'error_404_image' => env('BLOG_404_IMAGE', 'assets/img/error/404.png'),

    /*
    |--------------------------------------------------------------------------
    | SEO básico
    |--------------------------------------------------------------------------
    */

    'meta_title' => env('BLOG_META_TITLE', 'ArgusBlog'),

    'meta_description' => env(
        'BLOG_META_DESCRIPTION',
        'Blog sobre tecnología, Laravel, desarrollo web y programación'
    ),

    /*
    |--------------------------------------------------------------------------
    | Redes sociales
    |--------------------------------------------------------------------------
    */

    'social' => [
        'facebook' => env('SOCIAL_FACEBOOK'),
        'instagram' => env('SOCIAL_INSTAGRAM'),
        'youtube' => env('SOCIAL_YOUTUBE'),
    ],

];
