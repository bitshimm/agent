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
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Дата</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                @if ($page->isNotEmpty())

                @endif
                @foreach($page as $el)
                <tr>
                    <th scope="row">{{$el->id}}</th>
                    <td>{{$el->title}}</td>
                    <td>{{$el->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{route('pageEdit', $el->id)}}">
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
                                        Вы действительно хотите удалить {{ $el->title }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                        <a href="{{route('PageDeleteSubmit', $el->id)}}">
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