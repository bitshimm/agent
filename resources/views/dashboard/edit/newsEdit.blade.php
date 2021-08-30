@extends('layouts.app')

@section('content')
<div class="container p-5">
    <form action="{{ route('newsEditSubmit', $news->id)}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm 12">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="title" class="form-control" id="title" name="title" value="{{ $news->title }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <div class="news-img-item" style="background-image: url('{{ $news->thumb_image }}');">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-controll text-editor" name="description" id="description">{!! $news->description !!}</textarea>
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