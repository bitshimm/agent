@section('header')
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="">NavBar</a>
        <div class="nav-item d-sm-block d-md-block d-lg-none">
            <i class="fas fa-phone-alt fa-lg" style="transform: rotate(180deg);"></i>
            <i class="fal fa-phone fa-lg"></i>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo03">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item m-2">
                    <a href="#" role="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal1">Продукты и услуги</a>
                </li>
                <li class="nav-item m-2">
                    <a href="#" role="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal2">Клиенты</a>
                </li>
                <li class="nav-item m-2">
                    <a href="#" role="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal3">Контакты</a>
                </li>
                <li class="nav-item m-2">
                    <a href="#" role="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal4">О компании</a>
                </li>
            </ul>
        </div>
        <div class="nav-item d-none d-lg-block">
            <i class="fas fa-phone-alt"></i> +0 000-000-00-00 <br>
            <i class="fas fa-map-marker-alt"></i> Верхнее тушево 1 <br>
            <i class="far fa-envelope"></i> bestcompany@mail.ru
        </div>
    </div>
</nav>