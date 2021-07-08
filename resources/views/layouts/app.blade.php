<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/jQuery v3.6.0.js"></script>
</head>

<body style="background-color: lightcyan;">
    <header>
        @include('header')
    </header>
    <div class="main my-3">
        <div class="container">
            <div class="row">
                @include('filter')
                @include('news')
            </div>
            <div class="row">
                @include('description')
            </div>
            <div class="row">
                @include('slider')
            </div>
        </div>
    </div>
</body>

</html>