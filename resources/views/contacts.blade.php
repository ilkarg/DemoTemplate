<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вкусняшка - Где нас найти?</title>

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
                    <a class="nav-link active" aria-current="page" href="/contacts">Где нас найти?</a>
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

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2290.0513441654916!2d73.40020487614369!3d54.97219875184468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43aafde0c7512c3d%3A0x7d6bf4023be0dfe4!2z0JLQutGD0YHQvdGP0YjQutCwLCDQkdCw0L3QutC10YLQvdGL0Lkg0JfQsNC7IC0g0LfQsNC7INC90LUg0YHRg9GJ0LXRgdGC0LLRg9C10YI!5e0!3m2!1sru!2sru!4v1685797605524!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col">
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <p class="card-text"><b>Адрес:</b> Омск, ул. Маяковского, дом 81</p>
                    <p class="card-text"><b>Номер телефона:</b> +7 (123) 456-78-90</p>
                    <p class="card-text"><b>Электронная почта:</b> vkusniashka@mail.ru</p>
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
