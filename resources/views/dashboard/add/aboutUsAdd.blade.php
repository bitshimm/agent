@extends('layouts.app')

@section('content')

<div class="container p-5">
    <form action="{{ route('aboutUsAddSubmit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm 12">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="title" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="short_desc" class="form-label">Короткое описание</label>
                    <input type="short_desc" class="form-control" id="short_desc" name="short_desc" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание(необязательно)</label>
                    <textarea class="form-controll text-editor" name="description" id="description"></textarea>
                </div>
                <div class="justify-content-between d-flex">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection