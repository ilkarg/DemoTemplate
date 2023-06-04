<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вкусняшка - Регистрация</title>

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
                            <a href="{{ route('login') }}" class="nav-link">Вход</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link active">Регистрация</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-4" id="registerError"></div>
    <div class="row">
        <div class="form-login">
            <div id="name-div" class="login-input login-input-border">
                <label class="title-login" for="name">Имя</label>
                <input id="name" type="text" name="name" placeholder="Имя">
            </div>
            <div id="surname-div" class="login-input login-input-border">
                <label class="title-login" for="surname">Фамилия</label>
                <input id="surname" type="text" name="surname" placeholder="Фамилия">
            </div>
            <div id="patronymic-div" class="login-input login-input-border">
                <label class="title-login" for="patronymic">Отчество</label>
                <input id="patronymic" type="text" name="patronymic" placeholder="Отчество">
            </div>
            <div id="login-div" class="login-input login-input-border">
                <label class="title-login" for="login">Логин</label>
                <input id="login" type="text" name="login" placeholder="Логин">
            </div>
            <div id="email-div" class="login-input login-input-border">
                <label class="title-login" for="email">Эл.почта</label>
                <input id="email" type="text" name="email" placeholder="Эл.почта">
            </div>
            <div id="password-div" class="login-input login-input-border">
                <label class="title-password" for="password">Пароль</label>
                <input name="password" type="password" id="password" placeholder="Пароль">
            </div>
            <div id="password_repeat-div" class="login-input login-input-border">
                <label class="title-password" for="password_repeat">Повторите пароль</label>
                <input name="password_repeat" type="password" id="password_repeat" placeholder="Повторите пароль">
            </div>
            <div class="checkbox">
                <input id="rules" class="form-check-input" type="checkbox" name="rules">
                <label for="rules">Согласен с правилами регистрации</label>
            </div>
            <div class="btn-login text-center">
                <input type="submit" class="btn btn-primary" onclick="registrationQuery('{{ csrf_token() }}')" value="Регистрация">
            </div>
        </div>
    </div>
</div>

<!--JQuery JS-->
<script src="{{ asset('/js/jquery.js') }}"></script>
<!--Bootstrap JS-->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<!--Script JS-->
<script src="{{ asset('/js/script.js') }}"></script>
<!--Query JS-->
<script src="{{ asset('/js/query.js') }}"></script>
</body>
</html>
