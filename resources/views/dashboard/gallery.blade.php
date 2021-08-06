@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Галлерея</h3>
    <div class="mb-3">
        <a href="{{route('galleryAdd')}}">
            <button class="btn btn-primary">Добавить</i></button>
        </a>
    </div>
    @if ($gallery->isEmpty())
    <h1 class="text-center">
        Фотографий нет
    </h1>
    @endif
    <div class="row">
        @foreach($gallery as $el)
        <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
            <a href="/storage/{{$el->path_to_file }}" data-fancybox="gallery">
                <div class="gallery-item" style="background-image: url('/storage/{{$el->path_to_file }}');"></div>
            </a>
            <div class="gallery-item-desc mt-3 row">
                <div class="col-8 text-left">
                    <span>{{$el->name }}</span>
                </div>
                <div class="col-4 text-right">
                    <a href="#" role="button" class="nav-link border border-light p-0 border-0" data-bs-toggle="modal" data-bs-target="#delModal{{ $el->id }}">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </a>
                    <div class="modal fade" id="delModal{{ $el->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Вы действительно хотите удалить "{{ $el->name }}"
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                    <a href="{{route('galleryDeleteSubmit', $el->id)}}">
                                        <button class="btn btn-danger">Удалить</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection