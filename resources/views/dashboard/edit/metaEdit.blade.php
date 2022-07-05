@extends('layouts.app')

@section('content')
<div class="container p-5">
    <form action="{{ route('metaEditSubmit', $meta->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm 12">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $meta->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{!! $meta->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="site_name" class="form-label">Название сайта</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $meta->site_name }}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Тип</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $meta->type }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email (для почты)</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $meta->email }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <div class="news-img-item" style="background-image: url('{{ $meta->thumb_image }}');">
                    </div>
                    <label for="image" class="form-label m-0">Заменить</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="metrika" class="form-label">Метрика</label>
                    <textarea class="form-control" name="metrika" id="metrika" rows="6">{!! $meta->metrika !!}</textarea>
                </div>
                <div class="justify-content-between d-flex">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection