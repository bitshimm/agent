@extends('layouts.app')

@section('content')

<div class="container p-5">
    <form action="{{ route('galleryAddSubmit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm 12">
                <div class="mb-3">
                    <label for="name" class="form-label">Наименование</label>
                    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label m-0">Картинка</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>
</div>
@endsection