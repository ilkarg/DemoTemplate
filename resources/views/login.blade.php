<html>
    <head>
        <title>Авторизация</title>
    </head>
    <body>
        <div>
            <div>
                <label for="login">Login</label>

                <div>
                    <input id="login" type="login" name="login" value="{{ old('login') }}" required autofocus>

                    @error('login')
                    <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password">Password</label>

                <div>
                    <input id="password" type="password" name="password" required>

                    @error('password')
                    <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <button type="submit" onclick="loginQuery('{{ csrf_token() }}')">Войти</button>
                </div>
            </div>
        </div>

        <script src="{{ asset('/js/jquery.js') }}"></script>
        <script src="{{ asset('/js/query.js') }}"></script>
    </body>
</html>
