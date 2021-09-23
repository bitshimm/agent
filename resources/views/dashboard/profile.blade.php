@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Профиль</h3>
    <div class="row">
        <form action="{{ route('profileEditSubmit', $users->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <div class="form-group mb-3">
                    <label for="name" class="col-form-label text-md-right">{{ __('Имя') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $users->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}">
                </div>
                <div class="form-group mb-3 mt-3">
                    <h4>Смена пароля:</h4>
                    <input id="current_password" type="text" class="form-control mb-3" name="current_password" value="" placeholder="Старый пароль">
                    <input id="new_password" type="text" class="form-control mb-3" name="new_password" value="" placeholder="Новый пароль">
                    <input id="new_password_confirmation" type="text" class="form-control mb-3" name="new_password_confirmation" value="" placeholder="Подтвердите пароль">
                </div>
            </div>

            <div class="justify-content-between d-flex">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
            </div>
        </form>
    </div>
</div>

@endsection