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
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $users->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}">
                    </div>
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