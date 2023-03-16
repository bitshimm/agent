@extends('layouts.app')

@section('content')

<div class="container p-5">
    <form action="{{ route('socialAddSubmit')}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-3">
                <select class="form-select" aria-label="Default select example" name="social_icon" required>
                    <option selected value="" disabled>Выберите иконку</option>
                    <option value="fa-facebook-f">Facebook</option>
                    <option value="fa-vk">Vk</option>
                    <option value="fa-instagram">Instagram</option>
                    <option value="fa-twitter">Twitter</option>
                    <option value="fa-youtube">YouTube</option>
                    <option value="fa-odnoklassniki">Одноклассники</option>
                    <option value="fa-telegram">Telegram</option>
                </select>
            </div>
            <div class="col-lg-8 col-md-10 col-sm 12">
                <input type="link" class="form-control" name="link" placeholder="Ссылка" required>
            </div>
            <div class="col-12 text-start">
                <div class="justify-content-between d-flex">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection