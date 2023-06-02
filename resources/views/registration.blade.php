<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вкусняшка - Регистрация</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
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
<div>
    <div>
        <input id="name" type="text" name="name" placeholder="Имя">
    </div>
    <div>
        <input id="surname" type="text" name="surname" placeholder="Фамилия">
    </div>
    <div>
        <input id="patronymic" type="text" name="patronymic" placeholder="Отчество">
    </div>
    <div>
        <input id="login" type="text" name="login" placeholder="Логин">
    </div>
    <div>
        <input id="email" type="email" name="email" placeholder="Эл.почта">
    </div>
    <div>
        <input id="password" type="password" name="password" placeholder="Пароль">
    </div>
    <div>
        <input id="password_repeat" type="password" name="password_repeat" placeholder="Повтор пароля">
    </div>
    <div>
        <input id="rules" type="checkbox" name="rules">
        <label for="rules">Согласен с правилами регистрации</label>
    </div>
    <div>
        <div>
            <button type="submit" onclick="registrationQuery('{{ csrf_token() }}')">Регистрация</button>
        </div>
    </div>
</div>

<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/query.js') }}"></script>
</body>
</html>
