@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <h3>Темы</h3>
    <div class="row">
        <form action="{{ route('selectThemeEditSubmit', $selectThemes->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="name">
                    @foreach($themes as $theme)


                    <option value="{{ $theme->name }}" @if ($selectThemes->select_theme_name == $theme->name) selected @endif>{{ $theme->name }}</option>


                    @endforeach
                </select>
            </div>

            <div class="justify-content-between d-flex">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
            </div>
        </form>
    </div>
    <div class="row">
        @foreach($themes as $theme)
        <div class="col-lg-3 col-md-4 p-3">
            <h2 class="text-center">{{ $theme->name }}</h2>
            @if($theme->name == "Sea Breeze")
            <a href="/img/SeaBreezeTheme.webp" data-fancybox="gallery">
                <img src="/img/SeaBreezeTheme.webp" alt="" class="img-thumbnail">
            </a>
            @endif
            @if($theme->name == "Sunset")
            <a href="/img/SunsetTheme.webp" data-fancybox="gallery">
                <img src="/img/SunsetTheme.webp" alt="" class="img-thumbnail"></a>

            @endif
            @if($theme->name == "Paradise Beach")
            <a href="/img/ParadiseBeachTheme.webp" data-fancybox="gallery">
                <img src="/img/ParadiseBeachTheme.webp" alt="" class="img-thumbnail">
            </a>

            @endif
            @if($theme->name == "Blue Sky")
            <a href="/img/BlueSkyTheme.webp" data-fancybox="gallery">
                <img src="/img/BlueSkyTheme.webp" alt="" class="img-thumbnail">
            </a>

            @endif
            @if($theme->name == "Blue Air")
            <a href="/img/BlueAirTheme.webp" data-fancybox="gallery">
                <img src="/img/BlueAirTheme.webp" alt="" class="img-thumbnail">
            </a>

            @endif
            @if($theme->name == "Light Air")
            <a href="/img/LightAirTheme.webp" data-fancybox="gallery">
                <img src="/img/LightAirTheme.webp" alt="" class="img-thumbnail">
            </a>

            @endif
        </div>
        @endforeach
    </div>
</div>


@endsection