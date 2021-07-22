@extends('layouts.app')

@section('content')
<div class="container p-5">
    <form action="{{ route('contactEditSubmit', $contact->id)}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                <i class="fas {{$contact->icon}}"></i>
                <input type="name" class="form-control" name="value" placeholder="Значение" value="{{ $contact->value }}">
            </div>
            <div class="col-12 text-start justify-content-between d-flex">
                <button type="submit" class="btn btn-primary">Изменить</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
            </div>
        </div>
    </form>
</div>
@endsection