@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Страницы</h3>
    <div class="mb-3">
        <a href="{{route('pageAdd')}}">
            <button class="btn btn-primary">Добавить</i></button>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Дата</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($page as $el)
                <tr>
                    <th scope="row">{{$el->id}}</th>
                    <td>{{$el->title}}</td>
                    <td>{!! $el->description !!}</td>
                    <td>
                        <a href="">
                            <button class="btn btn-primary"><i class="fas fa-cogs"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="">
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection