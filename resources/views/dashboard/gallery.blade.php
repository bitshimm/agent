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
        <a href="{{route('galleryAdd')}}">
            <button class="btn btn-primary">Добавить</i></button>
        </a>
    </div>
    <div class="row">
        @foreach($gallery as $el)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="row gallery-item justify-content-center">
                <div class="gallery-image-container">
                    <img src="/storage/{{$el->path_to_file }}" class="">
                </div>
                <div class="col-6">{{$el->name }}</div>
                <div class="col-6 text-end">
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