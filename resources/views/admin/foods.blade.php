<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>Вкусняшка - Админ-Панель</title>

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
        <a class="navbar-brand">Вкусняшка (Админ-Панель)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/foods">Меню</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/admin/category">Категории</a>
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
    <div class="row text-center">
        <input type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFoodModal" value="Добавить блюдо">
    </div>
    <div class="row mt-2" id="foods"></div>
</div>

<!--Modal Add Food-->
<div class="modal fade" id="addFoodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFoodModalLabel">Добавление блюда</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body add-food-modal-body">
                <div class="row mt-4" id="addFoodError"></div>
                <div id="name-div" class="login-input login-input-border">
                    <label class="title-login" for="food-name">Название</label>
                    <input name="food-name" type="text" id="name" placeholder="Название">
                </div>
                <div id="image-div" class="w-50 mx-auto">
                    <label class="title-login" for="food-image">Изображение</label>
                    <input name="food-image" type="file" id="image" placeholder="Изображение">
                </div>
                <div id="price-div" class="login-input login-input-border">
                    <label class="title-login" for="food-price">Цена</label>
                    <input name="food-price" type="number" id="price" placeholder="Цена" value="0">
                </div>
                <div id="country-div" class="login-input login-input-border">
                    <label class="title-login" for="food-country">Страна</label>
                    <input name="food-country" type="text" id="country" placeholder="Страна">
                </div>
                <!-- Переписать категории на select, который заполняется с getCategoriesQuery() -->
                <div id="category-div" class="login-input login-input-border">
                    <label class="title-login" for="food-category">Категория</label>
                    <select name="food-category" id="category"></select>
                </div>
                <div id="ingredients-div" class="login-input login-input-border">
                    <label class="title-login" for="food-ingredients">Состав</label>
                    <textarea name="food-ingredients" id="ingredients" rows="50"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" onclick="addFoodQuery('{{ csrf_token() }}')">Добавить</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Confirm Delete Food-->
<div class="modal fade" id="confirmDeleteFoodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteFoodModalLabel">Удаление блюда</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body confirm-delete-food-modal-body">
                Вы уверены, что хотите удалить блюдо ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="removeFoodData()">Отмена</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="
                    deleteFoodQuery(JSON.parse(localStorage['food']).id, JSON.parse(localStorage['food']).name);
                ">Удалить</button>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        getFoodsAdminQuery();
        getCategoriesQuery();
    });
</script>
</body>
</html>
