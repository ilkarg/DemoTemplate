const loginQuery = (csrf_token) => {
    $('#login').removeClass('invalid-input');
    $('#login-div').addClass('login-input-border');
    $('#password').removeClass('invalid-input');
    $('#password-div').addClass('login-input-border');

    let errorDiv = document.createElement('div');
    errorDiv.classList.add('alert', 'alert-danger');
    errorDiv.setAttribute('role', 'alert');
    let errorsList = document.createElement('ul');
    errorsList.id = 'errorsList';

    if ($('#loginError>.alert').length) {
        $('.alert').remove();
    }

    if (isNull($('#login').val()) || isNull($('#password').val())) {
        let el = document.createElement('li');
        el.innerText = 'Все поля должны быть заполнены';
        errorsList.append(el);
        errorDiv.append(errorsList);
        $('#loginError').append(errorDiv);
    }

    $.ajax({
        url: '/api/v1/login',
        method: 'POST',
        dataType: 'json',
        data: {
            _token: csrf_token,
            login: $('#login').val(),
            password: $('#password').val()
        },
        success: (response) => {
            if (response.response === 'Вы успешно вошли в аккаунт') {
                window.location.href = '/';
            }
        },
        error: (response) => {
            response = JSON.parse(response.responseText);
            if (response.errors) {
                Object.keys(response.errors).map((key) => {
                    let el = document.createElement('li');
                    el.innerText = `${key}: ${response.errors[key]}`;
                    $(`#${key}`).addClass('invalid-input');
                    $(`#${key}-div`).removeClass('login-input-border');
                    errorsList.append(el);
                });
            } else if (response.response) {
                let el = document.createElement('li');
                el.innerText = `${response.response}`;
                errorsList.append(el);

                if (response.response === "Неверные логин или пароль") {
                    $('#login-div').removeClass('login-input-border');
                    $('#password-div').removeClass('login-input-border');

                    $('#login').addClass('invalid-input');
                    $('#password').addClass('invalid-input');
                }
            }

            errorDiv.append(errorsList);
            $('#loginError').append(errorDiv);
            window.scrollTo(0, 0);
        }
    });
}

const registrationQuery = (csrf_token) => {
    $('#name').removeClass('invalid-input');
    $('#name-div').addClass('login-input-border');
    $('#surname').removeClass('invalid-input');
    $('#surname-div').addClass('login-input-border');
    $('#patronymic').removeClass('invalid-input');
    $('#patronymic-div').addClass('login-input-border');
    $('#login').removeClass('invalid-input');
    $('#login-div').addClass('login-input-border');
    $('#email').removeClass('invalid-input');
    $('#email-div').addClass('login-input-border');
    $('#password').removeClass('invalid-input');
    $('#password-div').addClass('login-input-border');
    $('#password_repeat').removeClass('invalid-input');
    $('#password_repeat-div').addClass('login-input-border');

    let errorDiv = document.createElement('div');
    errorDiv.classList.add('alert', 'alert-danger');
    errorDiv.setAttribute('role', 'alert');
    let errorsList = document.createElement('ul');
    errorsList.id = 'errorsList';

    if ($('#registerError>.alert').length) {
        $('.alert').remove();
    }

    if (isNull($('#name').val()) || isNull($('#surname').val()) || isNull($('#login').val()) ||
        isNull($('#email').val()) || isNull($('#password').val()) || isNull($('#password_repeat').val())) {
        let el = document.createElement('li');
        el.innerText = 'Все поля должны быть заполнены';
        errorsList.append(el);
        errorDiv.append(errorsList);
        $('#registerError').append(errorDiv);
        return;
    }

    if (!$('#rules').is(':checked')) {
        let el = document.createElement('li');
        el.innerText = 'Необходимо согласиться с правилами';
        errorsList.append(el);
        errorDiv.append(errorsList);
        $('#registerError').append(errorDiv);
        return;
    }

    $.ajax({
        url: '/api/v1/registration',
        method: 'POST',
        dataType: 'json',
        data: {
            _token: csrf_token,
            name: $('#name').val(),
            surname: $('#surname').val(),
            patronymic: $('#patronymic').val(),
            login: $('#login').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_repeat: $('#password_repeat').val(),
            rules: $('#rules').is(':checked')
        },
        success: (response) => {
            if (response.response === 'Аккаунт успешно зарегистрирован') {
                window.location.href = '/';
            }
        },
        error: (response) => {
            response = JSON.parse(response.responseText);

            if (response.errors) {
                Object.keys(response.errors).map((key) => {
                    let el = document.createElement('li');
                    el.innerText = `${key}: ${response.errors[key]}`;
                    $(`#${key}`).addClass('invalid-input');
                    $(`#${key}-div`).removeClass('login-input-border');
                    errorsList.append(el);
                });

            } else if (response.response) {
                let el = document.createElement('li');
                el.innerText = `${response.response}`;
                errorsList.append(el);
            }

            errorDiv.append(errorsList);
            $('#registerError').append(errorDiv);
            window.scrollTo(0, 0);
        }
    });
}

const logoutQuery = (csrf_token) => {
    $.ajax({
        url: '/api/v1/logout',
        method: 'POST',
        dataType: 'json',
        data: {
            _token: csrf_token
        },
        success: (response) => {
            if (response.response === 'Вы успешно вышли из аккаунта') {
                window.location.reload();
            }
        }
    });
}

const getFoodsQuery = () => {
    $.ajax({
        url: '/api/v1/getFoods',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            response.map((food) => createFoodCard(food.id, food.name, food.image));
        }
    });
}

const getFoodsAdminQuery = () => {
    $.ajax({
        url: '/api/v1/getFoods',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            response.map((food) => createAdminFoodCard(food.id, food.name, food.image));
        }
    });
}

const getSliderFoodsQuery = () => {
    $.ajax({
        url: '/api/v1/getSliderFoods',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            response.reverse().map((food) => createSliderFood(food.name, food.image));
            if (response.length > 0) {
                $('.about-slider').removeClass('hidden');
            }
        }
    });
}

const deleteFoodQuery = (id, food) => {
    id = id.replace('food', '');

    $.ajax({
        url: `/api/v1/deleteFood/${id}`,
        method: 'DELETE',
        dataType: 'json',
        data: {
            _token: $('meta[name="_token"]').attr('content')
        },
        success: (response) => {
            document.querySelector(`#${JSON.parse(localStorage['elem']).id}`).remove();
            removeElemData();
        }
    });
}
