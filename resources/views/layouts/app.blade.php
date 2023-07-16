<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/main.css">
    @if($meta->title)
    <title>{{$meta->title}}</title>
    <meta property="og:title" content="{{$meta->title}}">
    @endif
    @if($meta->description)
    <meta name="description" content="{{$meta->description}}">
    <meta property="og:description" content="{{$meta->description}}">
    @endif
    @if($meta->type)
    <meta property="og:type" content="{{$meta->type}}">
    @endif
    @if($meta->site_name)
    <meta property="og:site_name" content="{{$meta->site_name}}">
    @endif
    @if($meta->image)
    <meta property="og:image" content="{{$url}}{{$meta->image}}">
    @endif
    @if($meta->metrika)
    {!! $meta->metrika !!}
    @endif
    @foreach ($select_themes as $theme)
    @if($theme->select_theme_name == "Sea Breeze")
    <link rel="stylesheet" href="/css/themes/SeaBreeze.css">
    @endif
    @if($theme->select_theme_name == "Sunset")
    <link rel="stylesheet" href="/css/themes/Sunset.css">
    @endif
    @if($theme->select_theme_name == "Paradise Beach")
    <link rel="stylesheet" href="/css/themes/ParadiseBeach.css">
    @endif
    @if($theme->select_theme_name == "Blue Sky")
    <link rel="stylesheet" href="/css/themes/BlueSky.css">
    @endif
    @if($theme->select_theme_name == "Blue Air")
    <link rel="stylesheet" href="/css/themes/BlueAir.css">
    @endif
    @if($theme->select_theme_name == "Light Air")
    <link rel="stylesheet" href="/css/themes/LightAir.css">
    @endif
    @endforeach

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    @if(Auth::check())
    <link rel="stylesheet" href="/plugins/summernote/summernote-lite.min.css">
    @endif
</head>

<body class="body-img">
    @if(Auth::check())
    <nav class="navbar navbar-expand-lg p-0 shadow bg-dark admin-nav">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarAdminPanel" aria-controls="navBarAdminPanel" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-item text-center">
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
                <ul class="navbar-nav  mb-2 mb-lg-0 text-center">
                    <li class="nav-item m-2 dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Контент
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{route('pages')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/pages*')) ? 'active' : '' }}"><i class="fas fa-file"></i>&nbsp;&nbsp;Страницы</a>
                            </li>
                            <li>
                                <a href="{{route('news')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/news*')) ? 'active' : '' }}"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;Новости</a>
                            </li>
                            <li>
                                <a href="{{route('specialOrders')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/specialOrders*')) ? 'active' : '' }}"><i class="fas fa-gift"></i>&nbsp;&nbsp;Спецпредложения</a>
                            </li>
                            <li>
                                <a href="{{route('aboutUs')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/aboutUs*')) ? 'active' : '' }}"><i class="fas fa-address-card"></i>&nbsp;&nbsp;О нас</a>
                            </li>
                            <li>
                                <a href="{{route('gallery')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/gallery*')) ? 'active' : '' }}"><i class="fas fa-images"></i>&nbsp;&nbsp;Галерея</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item m-2 dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Контакты
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{route('contacts')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/contacts*')) ? 'active' : '' }}"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;Контакты</a>
                            </li>
                            <li>
                                <a href="{{route('social')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/social*')) ? 'active' : '' }}"><i class="fas fa-link"></i>&nbsp;&nbsp;Соц.сети</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item m-2 dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Персонализация
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{route('widget')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/widget*')) ? 'active' : '' }}"><i class="fas fa-cog"></i>&nbsp;&nbsp;Виджет</a>
                            </li>
                            <li>
                                <a href="{{route('logotype')}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/logotype*')) ? 'active' : '' }}"><i class="far fa-smile-wink"></i>&nbsp;&nbsp;Логотип</a>
                            </li>
                            @foreach ($select_themes as $select_theme)
                            <li>
                                <a href="{{route('selectThemeEdit', $select_theme->id)}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/themes*')) ? 'active' : '' }}"><i class="fas fa-image"></i>&nbsp;&nbsp;Темы</a>
                            </li>
                            @endforeach
                            <li>
                                <a href="{{route('metaEdit', 1)}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/meta*')) ? 'active' : '' }}"><i class="fas fa-ruler"></i>&nbsp;&nbsp;Meta-информация</a>
                            </li>
                            <!-- @foreach($users as $user)
                            <li>
                                <a href="{{route('profileEdit', $user->id)}}" role="button" class="px-3 nav-link {{ (request()->is('admin/dashboard/profile*')) ? 'active' : '' }}"><i class="far fa-smile-wink"></i>&nbsp;&nbsp;Профиль</a>
                            </li>
                            @endforeach -->
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-item d-none d-lg-block text-center">
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
    <div>
        @yield('content')
    </div>


    <script src="/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @if(Auth::check())
    <script src="/plugins/summernote/summernote-lite.min.js"></script>
    <script src="/plugins/summernote/lang/summernote-ru-RU.js"></script>
    @endif
    <script src="https://riverlines.ru/src/riverlines.js"></script>
    <script src="/js/jquery.maskedinput.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        $(function() {
            // var Formbtn = function(context) {
            //     var ui = $.summernote.ui;

            //     var button = ui.button({
            //         contents: '<i class="fab fa-wpforms"></i> Форма',
            //         tooltip: 'Форма',
            //         click: function() {
            //             var formContent = document.createElement('div');
            //             formContent.innerHTML = "<form action=\"{{ route('callback')}}\" method=\"get\"><div class=\"call_back_form row justify-content-between\"> <div class=\"col-12 mb-4\"> <span>Остались вопросы? отправьте нам заявку на бесплатный звонок!</span> </div> <div class=\"col-lg-4 col-md-12 mb-2\"> <input type=\"text\" placeholder=\"ваше имя\" name=\"name\" required> </div> <div class=\"col-lg-4 col-md-12 mb-2\"> <input type=\"text\" id=\"phone\" placeholder=\"ваш телефон\" name=\"phone\" required> </div> <div class=\"col-lg-4 col-md-12 mb-2\"> <input type=\"submit\" value=\"заказать звонок\" class=\"send\"> </div> </div> </form> <br>";
            //             context.invoke('editor.insertNode', formContent);
            //         }
            //     });

            //     return button.render();
            // }
            @if(Auth::check())
            $('.text-editor').summernote({
                lang: "ru-RU",
                height: 650,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['mybutton', ['form']],
                ],
                // buttons: {
                //     form: Formbtn,
                // }
            });
            @endif
        });
    </script>
    <script type="text/javascript" src="/js/main.js"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(88497649, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/88497649" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</body>

</html>