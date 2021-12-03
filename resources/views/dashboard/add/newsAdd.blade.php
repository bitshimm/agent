@extends('layouts.app')

@section('content')

<div class="container p-5">
    <form action="{{ route('newsAddSubmit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm 12">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="title" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-controll text-editor" name="description" id="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label m-0">Изображение</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="justify-content-between d-flex">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </form>
    <div class="call_back_form row justify-content-between">
        <div class="col-12 mb-4">
            <span>Остались вопросы? Отправьте нам заявку на бесплатный звонок!</span>
        </div>
        <div class="col-lg-4 col-md-12 mb-2">
            <input type="text" placeholder="Ваше имя">
        </div>
        <div class="col-lg-4 col-md-12 mb-2">
            <input type="text" placeholder="Ваш телефон">
        </div>
        <div class="col-lg-4 col-md-12 mb-2">
            <input type="text" value="ЗАКАЗАТЬ ЗВОНОК" class="send">
        </div>
    </div>
    <br>
</div>
@endsection