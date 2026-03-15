@php
    $recentPosts = \App\Models\Post::where('status', 'published')
        ->orderByDesc('published_at')
        ->orderByDesc('created_at')
        ->take(5)
        ->get();
@endphp

<!doctype html>
<html lang="es">

<head>
    @include('partials.head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Página no encontrada</title>

    {{-- Favicon --}}
    <link rel="icon" sizes="32x32" href="{{ asset('assets/img/faviconAB2.png') }}">

    {{-- CSS del proyecto --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f5f5f7;
            font-family: "Inter Tight", sans-serif;
            color: #131315;
        }

        .error-404 {
            min-height: 100vh;
            padding: 60px 20px;
            display: flex;
            align-items: center;
        }

        .error-404__container {
            max-width: 1280px;
            margin: 0 auto;
            width: 100%;
        }

        .error-404__main {
            padding-right: 30px;
        }

        .error-404__image {
            max-width: 100%;
            margin-bottom: 25px;
            margin-top: 25px;
            text-align: center;
        }

        .error-404__image img {
            width: 100%;
            max-width: 900px;
            height: auto;
            display: inline-block;
        }

        .error-404__title {
            font-size: 54px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 16px;
            color: #13204a;
            text-align: center;
        }

        .error-404__text {
            font-size: 22px;
            line-height: 1.6;
            color: #5a6480;
            margin-bottom: 28px;
            text-align: center;
        }

        .error-404__buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .error-404__btn {
            min-width: 220px;
            padding: 15px 26px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
        }

        .error-404__btn--primary {
            background: linear-gradient(90deg, #3A4FBF 0%, #8A3FFC 100%);
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(90, 70, 220, 0.18);
        }

        .error-404__btn--primary:hover {
            color: #ffffff;
            transform: translateY(-2px);
            opacity: 0.95;
        }

        .error-404__btn--secondary {
            background: #e9edf5;
            color: #1f2744;
            border: 1px solid #d7ddeb;
        }

        .error-404__btn--secondary:hover {
            color: #1f2744;
            background: #dde4f0;
            transform: translateY(-2px);
        }

        .error-404__sidebar {
            background: #ffffff;
            border: 1px solid #e8ecf4;
            border-radius: 18px;
            padding: 26px 22px;
            box-shadow: 0 12px 28px rgba(19, 32, 74, 0.06);
        }

        .error-404__recent-title {
            font-size: 30px;
            font-weight: 800;
            color: #13204a;
            margin-bottom: 24px;
        }

        .error-404__sidebar-post {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            padding-bottom: 18px;
            margin-bottom: 18px;
            border-bottom: 1px solid #edf1f7;
        }

        .error-404__sidebar-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: 0;
        }

        .error-404__post-image {
            width: 96px;
            height: 78px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 10px;
            display: block;
        }

        .error-404__post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .error-404__post-content {
            min-width: 0;
            flex: 1;
        }

        .error-404__post-title {
            font-size: 16px;
            font-weight: 800;
            line-height: 1.35;
            margin-bottom: 8px;
            color: #13204a;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            line-clamp: 2;
        }

        .error-404__post-title a {
            color: inherit;
            text-decoration: none;
        }

        .error-404__post-title a:hover {
            color: #8A3FFC;
        }

        .error-404__post-date {
            font-size: 14px;
            color: #7a849d;
        }

        @media (max-width: 991.98px) {
            .error-404 {
                padding: 40px 16px;
            }

            .error-404__main {
                padding-right: 0;
                margin-bottom: 30px;
            }

            .error-404__title {
                font-size: 42px;
            }

            .error-404__text {
                font-size: 18px;
            }

            .error-404__sidebar {
                background: #ffffff;
                border: 1px solid #e8ecf4;
                border-radius: 18px;
                padding: 26px 22px;
                box-shadow: 0 12px 28px rgba(19, 32, 74, 0.06);

                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 100%;
            }
        }

        @media (max-width: 767.98px) {
            .error-404__title {
                font-size: 34px;
            }

            .error-404__text {
                font-size: 16px;
            }

            .error-404__btn {
                min-width: 100%;
            }

            .error-404__recent-title {
                font-size: 26px;
            }
        }
    </style>
</head>



<body>

    <!--loading -->
    @include('partials.loading')

    <!-- Header -->
    @include('partials.header')
    <section class="error-404">
        <div class="error-404__container">
            <div class="row align-items-center">

                {{-- Columna izquierda --}}
                <div class="col-lg-8">
                    <div class="error-404__main">

                        {{-- Imagen 404 --}}
                        <div class="error-404__image">
                            <img src="{{ asset('assets/img/error/404.png') }}" alt="Error 404">
                        </div>

                        {{-- Título --}}
                        <h1 class="error-404__title">
                            Página no encontrada
                        </h1>

                        {{-- Texto --}}
                        <p class="error-404__text">
                            Lo sentimos, la página que buscas no existe o ha sido movida.
                        </p>

                        {{-- Botones --}}
                        <div class="error-404__buttons">
                            <a href="{{ route('home') }}" class="error-404__btn error-404__btn--primary">
                                Volver al inicio
                            </a>

                            <a href="javascript:history.back()" class="error-404__btn error-404__btn--secondary">
                                Volver atrás
                            </a>
                        </div>

                    </div>
                </div>

                {{-- Columna derecha --}}
                <div class="col-lg-4">
                    @if ($recentPosts->count() > 0)
                        <div class="error-404__sidebar">
                            <h2 class="error-404__recent-title">Posts recientes</h2>

                            @foreach ($recentPosts as $recentPost)
                                <div class="error-404__sidebar-post">

                                    <a href="{{ route('posts.show', ['id' => $recentPost->id, 'slug' => $recentPost->slug]) }}"
                                        class="error-404__post-image">
                                        <img src="{{ $recentPost->featured_image ? \Illuminate\Support\Facades\Storage::url($recentPost->featured_image) : asset('assets/img/blog/1.jpg') }}"
                                            alt="{{ $recentPost->title }}">
                                    </a>

                                    <div class="error-404__post-content">
                                        <h3 class="error-404__post-title">
                                            <a
                                                href="{{ route('posts.show', ['id' => $recentPost->id, 'slug' => $recentPost->slug]) }}">
                                                {{ \Illuminate\Support\Str::limit($recentPost->title, 60) }}
                                            </a>
                                        </h3>

                                        <div class="error-404__post-date">
                                            {{ $recentPost->published_at?->format('d/m/Y') ?? $recentPost->created_at->format('d/m/Y') }}
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
    <!--newslettre-->
    @include('partials.newsletter')

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

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>




</html>
