function loginQuery(csrf_token) {
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
            } else {
                alert(response.response);
            }
        },
        error: (response) => {
            response = JSON.parse(response.responseText);
            alert(response.errors[Object.keys(response.errors)[0]][0]);
        }
    });
}

function registrationQuery(csrf_token) {
    if ($('#password').val() !== $('#password-confirm').val()) {
        alert('Пароль и повтор пароля не совпадают');
        return;
    }

    $.ajax({
        url: '/api/v1/registration',
        method: 'POST',
        dataType: 'json',
        data: {
            _token: csrf_token,
            login: $('#login').val(),
            password: $('#password').val()
        },
        success: (response) => {
            if (response.response === 'Аккаунт успешно зарегистрирован') {
                window.location.href = '/';
            } else {
                alert(response.response);
            }
        },
        error: (response) => {
            response = JSON.parse(response.responseText);
            alert(response.errors[Object.keys(response.errors)[0]][0]);
        }
    });
}

function logoutQuery(csrf_token) {
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
