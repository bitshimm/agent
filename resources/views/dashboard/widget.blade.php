@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Виджет</h3>
    <div class="row justify-content-center">
        @forelse ($widget as $widget_riverlines)
        <div class="col-12 text-center">
            {!! $widget_riverlines->code !!}
            <br>
            <a href="#" role="button" class="nav-link border border-light pt-2 border-0" data-bs-toggle="modal" data-bs-target="#delModal{{ $widget_riverlines->id }}">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
            <div class="modal fade" id="delModal{{ $widget_riverlines->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            Вы действительно хотите удалить виджет?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <a href="{{route('widgetDeleteSubmit', $widget_riverlines->id)}}">
                                <button class="btn btn-danger">Удалить</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <form action="{{ route('widgetAddSubmit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm 12">
                    <div class="mb-3">
                        <label for="widgetRiverlinesCode" class="form-label">Вставьте код с сайта Riverlines</label>
                        <textarea class="form-control" id="widgetRiverlinesCode" rows="5" name="code"></textarea>
                    </div>
                    <div class="justify-content-between d-flex">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                    </div>
                </div>
            </div>
        </form>
        @endforelse
    </div>
</div>


@endsection