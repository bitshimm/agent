@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Темы</h3>
    <div class="mb-3">
        <a href="{{route('themesAdd')}}">
            <button class="btn btn-primary">Добавить</i></button>
        </a>
    </div>
    <div class="row">
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            @foreach($themes as $theme)

            @foreach($select_themes as $select_theme)

            <option value="{{ $theme->name }}" @if ($select_theme->select_theme_name == $theme->name) selected @endif>{{ $theme->name }}</option>

            @endforeach

            @endforeach
        </select>

        <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
            <a href="/storage/{{$el->path_to_file }}" data-fancybox="themes">
                <div class="themes-item" style="background-image: url('/storage/{{$el->path_to_file }}');"></div>
            </a>
            <div class="themes-item-desc mt-3 row">
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
                                    <a href="{{route('themesDeleteSubmit', $el->id)}}">
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