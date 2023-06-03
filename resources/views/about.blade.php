<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вкусняшка - О нас</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!--Style CSS-->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!--Site Icon-->
    <link rel="icon" type="image/png" href="{{ asset('/assets/logo.png') }}">
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="{{ asset('/assets/logo.png') }}" alt="" width="30" height="24" class="mt-1 d-inline-block align-text-top">
        <a class="navbar-brand">Вкусняшка</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/menu">Меню</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/contacts">Где нас найти?</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="javascript:logoutQuery('{{ csrf_token() }}')" class="nav-link">Выход</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Вход</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="mt-3 container-fluid col-lg-2 col-md-3 col-sm-3 col-xs-6 about-slogan">
    <div class="row">
        <div class="col" style="display: flex">
            <img src="{{ asset('/assets/logo.png') }}" alt="" width="30" height="24" class="mt-1 d-inline-block align-text-top">
            <span class="slogan" style="font-size: 18px">Вкусняшка - Самые вкусные блюда только у нас</span>
        </div>
    </div>
</div>
<div class="mt-5 container-fluid col-lg-2 col-md-3 col-sm-3 col-xs-6 about-slider"><div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Food 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Food 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Food 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Food 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Food 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/assets/food1.jpg') }}" width="550" height="400" class="d-block w-100" alt="food1">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Блюдо 1</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/assets/food2.jpg') }}" width="550" height="400" class="d-block w-100" alt="food2">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Блюдо 2</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/assets/food3.jpg') }}" width="550" height="400" class="d-block w-100" alt="food3">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Блюдо 3</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/assets/food4.jpg') }}" width="550" height="400" class="d-block w-100" alt="food4">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Блюдо 4</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/assets/food5.jpg') }}" width="550" height="400" class="d-block w-100" alt="food5">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Блюдо 5</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
</div>

<!--JQuery JS-->
<script src="{{ asset('/js/jquery.js') }}"></script>
<!--Bootstrap JS-->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<!--Query JS-->
<script src="{{ asset('/js/query.js') }}"></script>
</body>
</html>
