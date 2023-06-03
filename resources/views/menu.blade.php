<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вкусняшка - Меню</title>

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
                    <a class="nav-link" aria-current="page" href="/">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/menu">Меню</a>
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
<div class="mt-3 container-fluid w-50 mx-auto">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mt-2 text-center" style="width: 13.5rem">
                <img class="card-img-top" width="160" height="160" src="{{ asset('/assets/food1.jpg') }}" alt="Food 1">
                <div class="card-body">
                    <h5 class="card-title">Блюдо 1</h5>
                    <a href="#" class="btn btn-primary" style="width: 110px !important;">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-2 text-center" style="width: 13.5rem">
                <img class="card-img-top" width="160" height="160" src="{{ asset('/assets/food2.jpg') }}" alt="Food 2">
                <div class="card-body">
                    <h5 class="card-title">Блюдо 2</h5>
                    <a href="#" class="btn btn-primary" style="width: 110px !important;">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-2 text-center" style="width: 13.5rem">
                <img class="card-img-top" width="160" height="160" src="{{ asset('/assets/food3.jpg') }}" alt="Food 3">
                <div class="card-body">
                    <h5 class="card-title">Блюдо 3</h5>
                    <a href="#" class="btn btn-primary" style="width: 110px !important;">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-2 text-center" style="width: 13.5rem">
                <img class="card-img-top" width="160" height="160" src="{{ asset('/assets/food4.jpg') }}" alt="Food 4">
                <div class="card-body">
                    <h5 class="card-title">Блюдо 4</h5>
                    <a href="#" class="btn btn-primary" style="width: 110px !important;">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-2 text-center" style="width: 13.5rem">
                <img class="card-img-top" width="160" height="160" src="{{ asset('/assets/food5.jpg') }}" alt="Food 5">
                <div class="card-body">
                    <h5 class="card-title">Блюдо 5</h5>
                    <a href="#" class="btn btn-primary" style="width: 110px !important;">Подробнее</a>
                </div>
            </div>
        </div>
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
