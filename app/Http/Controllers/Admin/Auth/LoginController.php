<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.index');
    }


    public function login(LoginRequest $request)
    {
        $user = User::where('phone', '=', $request->phone)->first();

        if (!$user) {
            return redirect()->back()->with(['danger' => 'Такой пользователь не зарегистрирован!']);
        }

        if (Auth::attempt($request->only('phone', 'password'))) {
            if ($user->role != 1 && $user->role != 2) {
                return redirect()->back()->with(['danger' => 'Нет доступа!']);
            }

            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return redirect()->back()->with(['danger' => 'Неверный пароль!']);
    }



    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function sendCodeView()
    {
        return view('auth.reset');
    }
    public function verifyView()
    {
        return view('auth.verify');
    }
}
