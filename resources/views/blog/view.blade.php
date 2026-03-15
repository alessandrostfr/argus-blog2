<!doctype html>
<html lang="es">

<head>
    @include('partials.head')
</head>

<body>

    <!--loading -->
    @include('partials.loading')

    <!-- Header -->
    @include('partials.header')

    <main class="main">
        <!--post-default-->
        <section class="mt-130 mb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 side-content">
                        <div class="theiaStickySidebar">
                            <!--Post-single-->
                            <div class="post-single">

                                {{-- Imagen principal del post --}}
                                <div class="post-single__image">
                                    <img src="{{ $post->featured_image ? Storage::url($post->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                        alt="{{ $post->title }}" class="post-single__image-img">
                                </div>

                                <div class="post-single__content">

                                    {{-- Categorías del post --}}
                                    @if ($post->categories->isNotEmpty())
                                        @foreach ($post->categories as $category)
                                            <a href="#" class="category">{{ $category->name }}</a>
                                        @endforeach
                                    @else
                                        <a href="#" class="category">Sin categoría</a>
                                    @endif

                                    {{-- Título del post --}}
                                    <h2 class="post-single__title">
                                        {{ $post->title }}
                                    </h2>

                                    {{-- Metadatos del post --}}
                                    <ul class="post-single__meta list-inline">
                                        <li class="post-single__meta-item">
                                            <a href="#">
                                                <img src="{{ asset('assets/img/author/1.png') }}"
                                                    alt="Autor {{ $post->user->name }}" class="post-single__meta-img">
                                            </a>
                                        </li>

                                        <li class="post-single__meta-item">
                                            <a href="#" class="post-single__meta-link">
                                                {{ $post->user->name }}
                                            </a>
                                        </li>

                                        <li class="post-single__meta-item">
                                            <span class="dot"></span>
                                            {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                </div>

                                {{-- Cuerpo del post --}}
                                <div class="post-single__body">

                                    {{-- Si el contenido tiene HTML, usamos {!! !!} --}}
                                    {!! $post->content !!}

                                </div>

                                {{-- Footer del post con tags --}}
                                <div class="post-single__footer">
                                    <ul class="list-inline widget__tags">

                                        @if ($post->tags->isNotEmpty())
                                            @foreach ($post->tags as $tag)
                                                <li class="widget__tags-item">
                                                    <a href="#" class="widget__tags-link">
                                                        {{ $tag->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="widget__tags-item">
                                                <span class="widget__tags-link">Sin etiquetas</span>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>

                            <!--Related-posts-->
                            <div class="row">

                                {{-- Post anterior --}}
                                <div class="col-md-6">
                                    @if ($previousPost)
                                        <div class="widget">
                                            <div class="widget__related-post">

                                                <div class="widget__related-post__image">
                                                    <a
                                                        href="{{ route('posts.show', ['id' => $previousPost->id, 'slug' => $previousPost->slug]) }}">
                                                        <img src="{{ $previousPost->featured_image ? Storage::url($previousPost->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                                            alt="{{ $previousPost->title }}"
                                                            class="widget__related-post__img">
                                                    </a>
                                                </div>

                                                <div class="widget__related-post__content">
                                                    <a class="btn-link"
                                                        href="{{ route('posts.show', ['id' => $previousPost->id, 'slug' => $previousPost->slug]) }}">
                                                        <i class="bi bi-arrow-left"></i> Previous post
                                                    </a>

                                                    <p class="widget__related-post__title">
                                                        <a href="{{ route('posts.show', ['id' => $previousPost->id, 'slug' => $previousPost->slug]) }}"
                                                            class="widget__related-post__link">
                                                            {{ $previousPost->title }}
                                                        </a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </div>

                                {{-- Post siguiente --}}
                                <div class="col-md-6">
                                    @if ($nextPost)
                                        <div class="widget">
                                            <div class="widget__related-post">

                                                <div class="widget__related-post__image">
                                                    <a
                                                        href="{{ route('posts.show', ['id' => $nextPost->id, 'slug' => $nextPost->slug]) }}">
                                                        <img src="{{ $nextPost->featured_image ? Storage::url($nextPost->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                                            alt="{{ $nextPost->title }}"
                                                            class="widget__related-post__img">
                                                    </a>
                                                </div>

                                                <div class="widget__related-post__content">
                                                    <a class="btn-link"
                                                        href="{{ route('posts.show', ['id' => $nextPost->id, 'slug' => $nextPost->slug]) }}">
                                                        Next post <i class="bi bi-arrow-right"></i>
                                                    </a>

                                                    <p class="widget__related-post__title">
                                                        <a href="{{ route('posts.show', ['id' => $nextPost->id, 'slug' => $nextPost->slug]) }}"
                                                            class="widget__related-post__link">
                                                            {{ $nextPost->title }}
                                                        </a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-xl-3 max-width side-sidebar">
                        <div class="theiaStickySidebar">
                            <!--widget-author-->
                            <div class="widget">

                                <div class="widget__author">

                                    {{-- Imagen del autor --}}
                                    <div class="widget__author-top">
                                        <a href="#" class="widget__author-link">

                                            <img src="{{ asset('assets/img/author/1.png') }}"
                                                alt="{{ $post->user->name }}" class="widget__author-img">

                                        </a>
                                    </div>

                                    <div class="widget__author-content">

                                        {{-- Nombre del autor --}}
                                        <h6 class="widget__author-name">
                                            {{ $post->user->name }}
                                        </h6>

                                        {{-- Descripción del autor --}}
                                        <p class="widget__author-bio">
                                            {{ $post->user->descripcion ?? 'Autor del blog.' }}
                                        </p>

                                        {{-- Redes sociales del autor --}}
                                        <ul class="list-inline social-media social-media--layout-two">

                                            {{-- Facebook --}}
                                            @if ($post->user->urlfacebook)
                                                <li class="social-media__item">
                                                    <a href="{{ $post->user->urlfacebook }}"
                                                        class="social-media__link color-facebook" target="_blank">
                                                        <i class="bi bi-facebook"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Instagram --}}
                                            @if ($post->user->urlinstagram)
                                                <li class="social-media__item">
                                                    <a href="{{ $post->user->urlinstagram }}"
                                                        class="social-media__link color-instagram" target="_blank">
                                                        <i class="bi bi-instagram"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- YouTube --}}
                                            @if ($post->user->urlyoutube)
                                                <li class="social-media__item">
                                                    <a href="{{ $post->user->urlyoutube }}"
                                                        class="social-media__link color-youtube" target="_blank">
                                                        <i class="bi bi-youtube"></i>
                                                    </a>
                                                </li>
                                            @endif

                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <!--widget-Latest-Posts-->
                            <div class="widget">

                                <h5 class="widget__title">Últimos Posts</h5>

                                <ul class="widget__latest-posts">

                                    @foreach ($latestSidebarPosts as $index => $latestPost)
                                        <li class="widget__latest-posts__item">

                                            {{-- Imagen --}}
                                            <div class="widget__latest-posts-image">
                                                <a href="{{ route('posts.show', ['id' => $latestPost->id, 'slug' => $latestPost->slug]) }}"
                                                    class="widget__latest-posts-link">

                                                    <img src="{{ $latestPost->featured_image ? Storage::url($latestPost->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                                        alt="{{ $latestPost->title }}"
                                                        class="widget__latest-posts-img">

                                                </a>
                                            </div>

                                            {{-- Número del post --}}
                                            <div class="widget__latest-posts-count">
                                                {{ $index + 1 }}
                                            </div>

                                            <div class="widget__latest-posts__content">

                                                {{-- Título --}}
                                                <p class="widget__latest-posts-title">
                                                    <a href="{{ route('posts.show', ['id' => $latestPost->id, 'slug' => $latestPost->slug]) }}"
                                                        class="widget__latest-posts-link">

                                                        {{ \Illuminate\Support\Str::limit($latestPost->title, 60) }}

                                                    </a>
                                                </p>

                                                {{-- Fecha --}}
                                                <small class="widget__latest-posts-date">
                                                    <i class="bi bi-clock-fill widget__latest-posts-icon"></i>

                                                    {{ $latestPost->published_at?->format('d M, Y') ?? $latestPost->created_at->format('d M, Y') }}

                                                </small>

                                            </div>

                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                            <!--widget-categories-->
                            <div class="widget">
                                <h5 class="widget__title">Categorías</h5>

                                <ul class="widget__categories">

                                    @forelse ($categories as $category)
                                        <li class="widget__categories-item">
                                            <a href="#" class="category widget__categories-link">
                                                {{ $category->name }}
                                            </a>

                                            <span class="ml-auto widget__categories-number">
                                                {{ $category->published_posts_count }}
                                                {{ Str::plural('Post', $category->published_posts_count) }}
                                            </span>
                                        </li>
                                    @empty
                                        <li class="widget__categories-item">
                                            <span class="widget__categories-number">No hay categorías</span>
                                        </li>
                                    @endforelse

                                </ul>
                            </div>



                            <!--widget-tags-->
                            <div class="widget">

                                <h5 class="widget__title">Tags</h5>

                                <ul class="list-inline widget__tags">

                                    @forelse ($post->tags as $tag)
                                        <li class="widget__tags-item">

                                            <a href="#" class="widget__tags-link">
                                                {{ $tag->name }}
                                            </a>

                                        </li>

                                    @empty

                                        <li class="widget__tags-item">
                                            <span class="widget__tags-link">No hay tags</span>
                                        </li>
                                    @endforelse

                                </ul>

                            </div>

                            <!--widget-ads-->
                            <div class="widget">
                                <h5 class="widget__title">Advertisement</h5>

                                <div class="widget__ads">
                                    <a href="#" class="widget__ads-link">
                                        <img src="{{ asset('assets/img/ads/ads3.jpg') }}" alt="Advertisement"
                                            class="widget__ads-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/-->

        <!--newslettre-->
        @include('partials.newsletter')
    </main>

    <!--footer-->
    @include('partials.footer')

    <!--Search-form-->
    <div class="search__box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 m-auto col-md-8 col-sm-11">
                    <div class="search__content ">
                        <button type="button" class="search__box-btn-close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <form class="search__form" action="search-page.html">
                            <input type="search" class="search__form-input" value=""
                                placeholder="What are you looking for?">
                            <button type="submit" class="search__form-btn-search">search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--plugins -->
    @include('partials.js')
</body>

</html>
