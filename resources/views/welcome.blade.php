<!doctype html>
<html lang="es">

<head>
    @include('partials.head')
</head>

<body>

    <!--loading -->
    @include('partials.loading')
    <!--/-->


    <!-- Header -->
    @include('partials.header')
    <!--/-->

    <main class="main">
        <!--slider-two-->
        <div class="slider slider--two">
            {{-- Slider superior --}}
            <div class="swiper slider__top">
                <div class="swiper-wrapper">

                    {{-- Recorremos los últimos 4 posts --}}
                    @foreach ($latestPosts as $post)
                        <div class="slider__item swiper-slide"
                            style="background-image: url('{{ $post->featured_image ? asset($post->featured_image) : asset('assets/img/blog/1.jpg') }}');">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-9 col-md-12">
                                        <div class="slider__item-content">

                                            {{-- Categorías  del post --}}
                                            @if ($post->categories->isNotEmpty())
                                                {{-- Mostramos todas las categorías del post --}}
                                                @foreach ($post->categories as $category)
                                                    <a href="#" class="category">
                                                        {{ $category->name }}
                                                    </a>
                                                @endforeach
                                            @else
                                                {{-- Si el post no tiene categorías --}}
                                                <a href="#" class="category">
                                                    Sin categoría
                                                </a>
                                            @endif

                                            {{-- Título del post --}}
                                            <h1 class="slider__title">
                                                <a href="{{ route('posts.show', $post->slug) }}"
                                                    class="slider__title-link">
                                                    {{ $post->title }}
                                                </a>
                                            </h1>

                                            {{-- Resumen del post --}}
                                            <p class="slider__exerpt">
                                                {{ $post->summary ?? \Illuminate\Support\Str::limit(strip_tags($post->content), 140) }}
                                            </p>

                                            <ul class="slider__meta list-inline">
                                                <li class="slider__meta-item">
                                                    <a href="#" class="slider__meta-link">
                                                        <img src="{{ asset('assets/img/author/1.jpg') }}"
                                                            alt="Autor {{ $post->user->name }}"
                                                            class="slider__meta-img">
                                                    </a>
                                                </li>

                                                <li class="slider__meta-item">
                                                    <a href="#" class="slider__meta-link">
                                                        {{ $post->user->name }}
                                                    </a>
                                                </li>

                                                <li class="slider__meta-item">
                                                    <span class="dot"></span>
                                                    {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- Slider inferior / miniaturas --}}
            <div thumbsSlider="" class="swiper slider__bottom container-fluid">
                <div class="swiper-wrapper">

                    {{-- Recorremos de nuevo los mismos 4 posts --}}
                    @foreach ($latestPosts as $post)
                        <div class="swiper-slide">
                            <div class="post-slider">

                                {{-- Imagen destacada del post o fallback --}}
                                <img src="{{ $post->featured_image ? asset($post->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                    alt="{{ $post->title }}" class="post-slider__img">

                                <div class="post-slider__content">
                                    <p class="post-slider__title">
                                        <span>{{ $post->title }}</span>
                                    </p>

                                    <ul class="post-slider__meta list-inline">
                                        <li class="post-slider__meta-link">
                                            <i class="bi bi-clock-fill"></i>
                                            {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!--blog-Home-2-->
        <section class="mt-90">
            <div class="container-fluid">
                <div class="row">

                    {{-- Recorremos los posts paginados --}}
                    @forelse ($posts as $post)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="post-card post-card--default">

                                {{-- Imagen del post --}}
                                <div class="post-card__image">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <img src="{{ $post->featured_image ? asset($post->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                            alt="{{ $post->title }}">
                                    </a>
                                </div>

                                <div class="post-card__content">

                                    {{-- Mostramos todas las categorías del post --}}
                                    @if ($post->categories->isNotEmpty())
                                        @foreach ($post->categories as $category)
                                            <a href="#" class="category">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    @else
                                        <a href="#" class="category">
                                            Sin categoría
                                        </a>
                                    @endif

                                    {{-- Título del post --}}
                                    <h5 class="post-card__title">
                                        <a href="{{ route('posts.show', $post->slug) }}" class="post-card__title-link">
                                            {{ $post->title }}
                                        </a>
                                    </h5>

                                    {{-- Resumen del post --}}
                                    <p class="post-card__exerpt">
                                        {{ $post->summary ?? \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}
                                    </p>

                                    {{-- Metadatos del post --}}
                                    <ul class="post-card__meta list-inline">
                                        <li class="post-card__meta-item">
                                            <a href="#" class="post-card__meta-link">
                                                <img src="{{ asset('assets/img/author/1.png') }}"
                                                    alt="Autor {{ $post->user->name }}" class="post-card__meta-img">
                                            </a>
                                        </li>

                                        <li class="post-card__meta-item">
                                            <a href="#" class="post-card__meta-link">
                                                {{ $post->user->name }}
                                            </a>
                                        </li>

                                        <li class="post-card__meta-item">
                                            <span class="dot"></span>
                                            {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Mensaje si no hay posts --}}
                        <div class="col-12">
                            <p>No hay posts publicados todavía.</p>
                        </div>
                    @endforelse

                </div>

                {{-- Paginación --}}
                @if ($posts->hasPages())
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination list-inline">

                                {{-- Página anterior --}}
                                @if ($posts->onFirstPage())
                                    <li class="pagination__item disabled">
                                        <span class="pagination__link">
                                            <i class="bi bi-arrow-left pagination__icon"></i>
                                        </span>
                                    </li>
                                @else
                                    <li class="pagination__item">
                                        <a href="{{ $posts->previousPageUrl() }}" class="pagination__link">
                                            <i class="bi bi-arrow-left pagination__icon"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Números de página --}}
                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                    @if ($i == $posts->currentPage())
                                        <li class="pagination__item pagination__item--active">
                                            <span class="pagination__link">{{ $i }}</span>
                                        </li>
                                    @else
                                        <li class="pagination__item">
                                            <a href="{{ $posts->url($i) }}"
                                                class="pagination__link">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor

                                {{-- Página siguiente --}}
                                @if ($posts->hasMorePages())
                                    <li class="pagination__item">
                                        <a href="{{ $posts->nextPageUrl() }}" class="pagination__link">
                                            <i class="bi bi-arrow-right pagination__icon"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="pagination__item disabled">
                                        <span class="pagination__link">
                                            <i class="bi bi-arrow-right pagination__icon"></i>
                                        </span>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!--/-->

        <!--newslettre-->
        @include('partials.newsletter')
    </main>

    <!--Footer-->
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

    @include('partials.js')

</body>

</html>
