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
                    <a class="nav-link" aria-current="page" href="/admin/foods">Меню</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/category">Категории</a>
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
        <input type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal" value="Добавить категорию">
    </div>
    <div class="row mt-2" id="categories"></div>
</div>

<!--Modal Add Category-->
<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFoodModalLabel">Добавление категории</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body add-category-modal-body">
                <div class="row mt-4" id="addCategoryError"></div>
                <div id="name-div" class="login-input login-input-border">
                    <label class="title-login" for="category">Название</label>
                    <input name="category" type="text" id="name" placeholder="Название">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" onclick="addAdminCategoryQuery('{{ csrf_token() }}')">Добавить</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Confirm Delete Category-->
<div class="modal fade" id="confirmDeleteCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteFoodModalLabel">Удаление категории</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body confirm-delete-category-modal-body">
                Вы уверены, что хотите удалить категорию ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="removeCategoryData()">Отмена</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="
                    deleteCategoryQuery(JSON.parse(localStorage['category']).id, JSON.parse(localStorage['category']).name);
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
    document.addEventListener('DOMContentLoaded', () => getAdminCategoriesQuery());
</script>
</body>
</html>
