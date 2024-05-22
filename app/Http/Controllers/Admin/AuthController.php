<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.index');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('phone', 'password')))
        {
            $request->session()->regenerate();
            return redirect()->route('main');
        }
        return redirect()->back()->with(['danger' => 'Неравильный пароль или логин!']);
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
