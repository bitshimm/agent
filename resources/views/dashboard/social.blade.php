@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Контакты</h3>
    <div class="mb-3">
        <a href="{{route('socialAdd')}}">
            <button class="btn btn-primary">Добавить</button>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Иконка</th>
                    <th>Ссылка</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($social as $el)
                <tr>
                    <th scope="row">{{$el->id}}</th>
                    <td><i class="fab {{$el->social_icon}}"></i></td>
                    <td>{{$el->link}}</td>
                    <td>
                        <a href="{{route('socialEdit', $el->id)}}">
                            <button class="btn btn-primary"><i class="fas fa-cogs"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="#" role="button" class="nav-link border border-light p-0 border-0" data-bs-toggle="modal" data-bs-target="#delModal{{ $el->id }}">
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </a>
                        <div class="modal fade" id="delModal{{ $el->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        Вы действительно хотите удалить <i class="fas {{$el->icon}}"></i> {{$el->link}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                        <a href="{{route('socialDeleteSubmit', $el->id)}}">
                                            <button class="btn btn-danger">Удалить</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="">

                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection