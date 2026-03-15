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

                                            {{-- Categoría principal del post --}}
                                            @if ($post->categories->isNotEmpty())
                                                <a href="#" class="category">
                                                    {{ $post->categories->first()->name }}
                                                </a>
                                            @else
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
                    <!--Post-1-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/25.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">5 Effective Ways I’m
                                        Finding Focus in a Busy Season of Life</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-2-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/23.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">Get the Most Out of
                                        Iceland with our 10 Travel Tips</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-3-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/24.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">7 Holiday Decor Ideas
                                        and Exactly What I Love About Each One</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-4-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/21.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">7 Holiday Decor Ideas
                                        and Exactly What I Love About Each One</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-5-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/22.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">Get the Most Out of
                                        Iceland with our 10 Travel Tips</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-6-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/27.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">Get the Most Out of
                                        Iceland with our 10 Travel Tips</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-7-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/26.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">5 Effective Ways I’m
                                        Finding Focus in a Busy Season of Life</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-8-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/28.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">What Are Your Tips for
                                        Hosting an Easy Birthday Party?</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Post-9-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="post-default.html">
                                    <img src="assets/img/blog/28.jpg" alt="">
                                </a>
                            </div>

                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category">lifestyle</a>
                                <h5 class="post-card__title">
                                    <a href="post-default.html" class="post-card__title-link">Get the Most Out of
                                        Iceland with our 10 Travel Tips</a>
                                </h5>
                                <p class="post-card__exerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Odit quam atque ipsa laborum sunt distinctio...
                                </p>

                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="author.html" class="post-card__meta-link">
                                            <img src="assets/img/author/1.jpg" alt=""
                                                class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="author.html" class="post-card__meta-link">David Smith</a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> February 10, 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--pagination-->
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pagination list-inline">
                            <li class="pagination__item pagination__item--active"><a href="#"
                                    class="pagination__link">1</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link">2</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link">3</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link">4</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link"><i
                                        class="bi bi-arrow-right pagination__icon"></i></a></li>
                        </ul>
                    </div>
                </div>
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
