<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="/plugins/summernote/summernote-lite.min.css">
</head>

<body class="body-img">
    @if(Auth::check())
    <nav class="navbar navbar-expand-lg p-0 shadow bg-dark admin-nav">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarAdminPanel" aria-controls="navBarAdminPanel" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-item">
                <a href="{{route('main')}}" role="button" class="nav-link {{ Request::is('/') ? 'active' : null }}"><i class="fas fa-home"></i>&nbsp;&nbsp;Главная</a>
            </div>
            <div class="nav-item d-block d-lg-none">
                @guest
                @else
                <div class="nav-item m-2">
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" role="button" class="px-3 nav-link text-center">
                        <i class="fas fa-sign-out-alt d-sm-block d-md-block d-lg-none"></i>
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navBarAdminPanel">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item m-2">
                        <a href="{{route('pages')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/pages*')) ? 'active' : '' }}"><i class="fas fa-file"></i>&nbsp;&nbsp;Страницы</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="{{route('gallery')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/gallery*')) ? 'active' : '' }}"><i class="fas fa-images"></i>&nbsp;&nbsp;Галлерея</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="{{route('contacts')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/contacts*')) ? 'active' : '' }}"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;Контакты</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="{{route('news')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/news*')) ? 'active' : '' }}"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;Новости</a>
                    </li>
                </ul>
            </div>
            <div class="nav-item d-none d-lg-block">
                @guest
                @else
                <div class="nav-item m-2">
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" role="button" class="px-3 nav-link text-center">
                        
                        <span class="d-none d-lg-block"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Выйти</span>
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
    </nav>

    @endif
    <div style="min-height: 1000px;">
        @yield('content')
    </div>


    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://riverlines.ru/src/riverlines.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="/plugins/summernote/summernote-lite.min.js"></script>
    <script src="/plugins/summernote/lang/summernote-ru-RU.js"></script>
    <script>
        $(function() {
            $('.text-editor').summernote({
                lang: "ru-RU",
                height: 200
            });
        });
    </script>
</body>

</html>