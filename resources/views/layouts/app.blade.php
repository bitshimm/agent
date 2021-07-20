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
    <nav class="navbar navbar-expand-lg p-0 shadow bg-body rounded">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarAdminPanel" aria-controls="navBarAdminPanel" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navBarAdminPanel">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item m-2">
                        <a href="{{route('pages')}}" role="button" class="nav-link border border-light">страницы</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="#" role="button" class="nav-link border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal2">Клиенты</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="#" role="button" class="nav-link border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal3">Контакты</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="#" role="button" class="nav-link border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal4">О компании</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif

    @yield('content')
    
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
                lang:"ru-RU"
            });
        });
    </script>
</body>

</html>