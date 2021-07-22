@extends('layouts.app')

@section('content')

<div class="container p-5">
    <form action="{{ route('contactAddSubmit')}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-3">
                <select class="form-select" aria-label="Default select example" name="icon">
                    <option selected>Выберите иконку</option>
                    <option value="fa-phone-alt">Телефон (+74951234567)</option>
                    <option value="fa-map-marker-alt">Адрес</option>
                    <option value="fa-envelope">Почта</option>
                    <option value="fa-clock">Часы</option>
                </select>
            </div>
            <div class="col-lg-8 col-md-10 col-sm 12">
                <input type="name" class="form-control" name="value" placeholder="Значение">
            </div>
            <div class="col-12 text-start">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>
</div>
@endsection