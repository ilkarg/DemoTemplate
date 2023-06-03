<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вкусняшка - Вход</title>

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
                            <a href="{{ route('login') }}" class="nav-link active">Вход</a>
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
<div class="container">
    <div class="row mt-4" id="loginError">
    </div>
    <div class="row">
        <div class="form-login">
            <div id="login-div" class="login-input login-input-border">
                <label class="title-login" for="login">Логин</label>
                <input name="login" type="text" id="login" placeholder="Логин">
            </div>
            <div id="password-div" class="login-input login-input-border">
                <label class="title-password" for="password">Пароль</label>
                <input name="password" type="password" id="password" placeholder="Пароль">
            </div>
            <div class="btn-login text-center">
                <input type="submit" class="btn btn-primary" onclick="loginQuery('{{ csrf_token() }}')" value="Войти">
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
