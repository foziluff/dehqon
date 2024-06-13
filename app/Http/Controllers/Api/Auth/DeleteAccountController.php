<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DeleteRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class DeleteAccountController extends Controller
{
    public function show()
    {
        return view('delete.index');
    }


    public function destroy(DeleteRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            if (Auth::attempt($request->only('phone', 'password'))) {
                if ($user->id == 1) {
                    return redirect()->back()->withErrors(['error' => 'Нельзя удалить админа!']);
                }
                $user->delete();
                return redirect()->back()->with('success', 'Пользователь успешно удален!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Неверный пароль!']);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Пользователь не существует!']);
        }
    }
}
