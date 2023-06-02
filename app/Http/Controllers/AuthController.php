<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required|min:8|max:15'
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'response' => 'Вы успешно вошли в аккаунт'
            ], 200);
        }

        return response()->json([
            'response' => 'Неверные логин или пароль'
        ], 400);
    }

    public function registration(Request $request) {
        $credentials = $request->validate([
            'login' => 'required|unique:users,login',
            'password' => 'required|min:8|max:15'
        ]);

        $user = User::create([
            'login' => $credentials['login'],
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
