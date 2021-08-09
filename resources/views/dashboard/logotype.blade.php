@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Логотип</h3>
    <div class="row justify-content-center">
        @forelse ($logotype as $logo)
        <div class="col-lg-4 col-md-6 col-dm-12 text-center">
            <img src="/storage/{{ $logo->path_to_file }}" alt="" style="width: 100px;">
            <br>
            <span>
                {{ $logo->title }}
            </span>
            <a href="#" role="button" class="nav-link border border-light pt-2 border-0" data-bs-toggle="modal" data-bs-target="#delModal{{ $logo->id }}">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
            <div class="modal fade" id="delModal{{ $logo->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            Вы действительно хотите удалить
                            <img src="/storage/{{ $logo->path_to_file }}" alt="" style="width: 100px;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <a href="{{route('logotypeDeleteSubmit', $logo->id)}}">
                                <button class="btn btn-danger">Удалить</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <form action="{{ route('logotypeAddSubmit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm 12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="title" class="form-control" id="title" aria-describedby="titleHelp" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label m-0">Логотип</label>
                        <input class="form-control" type="file" id="image" name="image" required>
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