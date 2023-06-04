<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() {
        return view('about');
    }

    public function menu() {
        return view('menu');
    }

    public function contacts() {
        return view('contacts');
    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function adminIndex() {
        return view('admin.index');
    }

    public function adminFoods() {
        return view('admin.foods');
    }

    public function adminCategory() {
        return view('admin.category');
    }
}
