<html>
    <head>
        <title>Регистрация</title>
    </head>
    <body>
        <div>
            <div>
                <label for="login">Login</label>
                <div>
                    <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus>
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
                <label for="password-confirm">Confirm Password</label>
                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>
            </div>
            <div>
                <div>
                    <!--<button type="submit">{{ __('Register') }}</button>-->
                    <button type="submit" onclick="registrationQuery('{{ csrf_token() }}')">Регистрация</button>
                </div>
            </div>
        </div>

        <script src="{{ asset('/js/jquery.js') }}"></script>
        <script src="{{ asset('/js/query.js') }}"></script>
    </body>
</html>
