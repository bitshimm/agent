@extends('layouts.app')

@section('content')

<div class="main">
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">NavBar</a>
                <div class="nav-item d-sm-block d-md-block d-lg-none header-md-phone">
                    <i class="fas fa-phone-alt fa-lg"></i>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo03">
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        @foreach ($navPage as $page)
                        <li class="nav-item m-2">
                            <a href="#" role="button" class="nav-link border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $page->id }}">{{ $page->title }}</a>
                        </li>
                        <div class="modal fade" id="exampleModal{{ $page->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $page->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $page->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </ul>
                </div>
                <div class="nav-item d-none d-lg-block contacts-head" style="max-width: 250px;">
                    @foreach($contacts as $contact)
                    <p><i class="fas {{ $contact->icon }}"></i>&nbsp;{{ $contact->value }}</p>
                    @endforeach
                </div>
            </div>
        </nav>
    </header>
    <section class="site_bg_image">
        <div class="main mb-3">
            <div class="container">
                <div class="row d-none d-lg-block pt-2">
                    <div class="col-2 offset-10 text-start text-white p-0">
                        <h4>НОВОСТИ</h4>
                    </div>
                </div>
                <div class="row pt-sm-3 pt-lg-0">
                    <div class="col-lg-10 col-md-12 mb-4">
                        <div class="filter-site pt-3 pb-5 px-2">
                            <div class="text-white row my-4">
                                <div class="col-5 text-end"><i class="fas fa-search fa-2x"></i></div>
                                <div class="col-7 text-left"><span class="h3 pl-5">Подобрать круиз</span></div>
                            </div>
                            <div>
                                <div id="riverlines" data-key="f09e2d456b55d09d6db622c42f5e67237779f355" data-id="1686"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-4">
                        <div class="text-center news-title d-lg-none d-sm-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                            </svg>
                            <span>НОВОСТИ</span>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-3 col-sm-10 m-sm-2 m-lg-0 mb-2 news-item p-0">
                                <div class="text-end news-head">
                                    <img class="img-fluid" src="https://volga-flot.ru/wp-content/uploads/2018/02/tseny-i-raspisanie-kruizov-po-volge-iz-samary-v-2018-godu.jpg" alt="">
                                    <span class="small p-2 news-date">11.11.1111</span>
                                </div>
                                <div class="text-center px-2">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam illo et accusantium ex aspernatu
                                    </p>
                                </div class="px-2">
                                <div class="my-3 mx-4 news-line">
                                </div>
                                <div class="text-center mb-3 px-2">
                                    <button type="button" class="btn btn-danger">Подробнее</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 decription-site">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <h2>Круиз - это выгодно</h2>
                                </div>
                                <div>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi ea quasi, eveniet at saepe omnis consequuntur? Voluptatem repellendus nobis consectetur aliquid soluta adipisci. Cum aut doloribus officia dolore, magni consequuntur!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur officiis accusamus sequi voluptatibus voluptatum? Magni, fugit adipisci. Modi, inventore odio! Reiciendis, maiores sunt. Delectus esse reprehenderit qui, tempore ipsa impedit.
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat error eveniet animi dolores odio eum officia culpa ipsa repellat deserunt voluptatum quae est placeat ad, unde rerum consequuntur alias cumque!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti fugit, mollitia in inventore atque minima illo vel itaque, facere nihil illum sunt quibusdam exercitationem asperiores quasi nostrum eum odio aperiam!
                                    </p>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-danger">Читать больше »</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($gallery->isNotEmpty())
                <div class="row">
                    <div class="col-12 text-end my-3 text-white">
                        <h2 class="px-4">Фото</h2>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="photo-slider px-4">
                            @foreach($gallery as $photo)
                            <a class="photo-item" data-fancybox="gallery" href="/storage/{{ $photo->path_to_file }}">
                                <img src="/storage/{{ $photo->path_to_file }}" alt="">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="container mt-5 py-5">
            <div class="row footer py-5 px-3">
                <div class="col-lg-1 col-md-1 d-none d-md-block text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                    </svg>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="footer-contacts">
                                <div class="f-contact-item">
                                    <h3>Наши контакты</h3>
                                </div>
                                <div class="f-contact-item">
                                    <a class="navbar-brand ml-4" href="">NavBar</a>
                                </div>
                                <div class="f-contact-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <span class="h4"> +7 999 999 99 99</span>
                                </div>
                                <div class="f-contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>г. Москва, Красный переулок д.1</span>
                                </div>
                                <div class="f-contact-item">
                                    <i class="far fa-envelope"></i>
                                    <span>touragency@mail.ru</span>
                                </div>
                                <div class="f-contact-item">
                                    <i class="far fa-clock"></i>
                                    <span class="fw-bold">
                                        Режим работы:&nbsp;
                                    </span>
                                    <span>
                                        Пн-Пт: 9:00 - 18:00, Сб-Вс: выходной
                                    </span>
                                </div>
                                <div class="f-contact-item">
                                    <i class="far fa-comment"></i>
                                    <span class="fw-bold">
                                        Мы в соцсетях:&nbsp;
                                    </span>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fab fa-vk"></i></a>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fab fa-odnoklassniki"></i></a>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection