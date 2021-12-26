<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Агрегатор | @show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/4cb6920ffd/UntitledProject/style-svg.css">
    <script defer src="https://i.icomoon.io/public/temp/4cb6920ffd/UntitledProject/svgxuse.js"></script>
</head>
<body>
<div class="wrap">
            <header>
                <a class="title" href="{{ route('root') }}"><h1>NewsToday</h1></a>
                <div class="auth_box">
                    @yield('auth')
                </div>
                <div class="search">
                    <form>
                        <input type="text" placeholder="найти новость">
                    </form>
                    <div class="icon_place">
                        <svg class="icon icon-search"><use xlink:href="#icon-search"></use>
                            <symbol id="icon-search" viewBox="0 0 32 32">
                                <path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path>
                            </symbol>
                        </svg>
                    </div>
                </div>
            </header>
            <div class="container_m">
                @yield('menu')
                <div class="cont">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer>

        </footer>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/styles.js') }}"></script>
</body>
</html>