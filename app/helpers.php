<?php

if (!function_exists('social')) {

    /**
     * Devuelve la URL de una red social del blog.
     */
    function social(string $network): ?string
    {
        return config("blog.social.$network");
    }
}

if (!function_exists('blog_config')) {

    /**
     * Devuelve un valor del archivo config/blog.php
     *
     * Ejemplo:
     * blog_config('name')
     * blog_config('posts_per_page')
     */
    function blog_config(string $key, mixed $default = null): mixed
    {
        return config("blog.$key", $default);
    }
}
