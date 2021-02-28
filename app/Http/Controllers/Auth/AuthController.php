<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        UserService::createUser($request->validated());
        return redirect('/login');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        Auth::attempt($request->validated(), (bool)$request->get('remember', false));
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
