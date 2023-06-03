<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'login' => 'required|regex:/^.+[A-Za-z0-9\-].+$/i',
            'password' => 'required|min:6|max:15'
        ]);

        $user = User::whereRaw("BINARY login = ?", [$credentials['login']])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return response()->json([
                'response' => 'Вы успешно вошли в аккаунт'
            ], 200);
        }

        return response()->json([
            'response' => 'Неверные логин или пароль'
        ], 400);
    }

    public function registration(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|regex:/^.+[А-Яа-яЁё\s\-].+$/i',
            'surname' => 'required|regex:/^.+[А-Яа-яЁё\s\-].+$/i',
            'patronymic' => 'nullable|regex:/^.+[А-Яа-яЁё\s\-].+$/i',
            'login' => 'required|unique:users,login|regex:/^.+[A-Za-z0-9\-].+$/i',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6|max:15',
            'password_repeat' => [
                'required',
                Rule::in([$request->input('password')])
            ]
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'surname' => $credentials['surname'],
            'patronymic' => $credentials['patronymic'],
            'login' => $credentials['login'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);

        Auth::login($user);

        return response()->json([
            'response' => 'Аккаунт успешно зарегистрирован'
        ], 200);
    }

    public function logout() {
        Auth::logout();
        return response()->json([
            'response' => 'Вы успешно вышли из аккаунта'
        ], 200);
    }
}
