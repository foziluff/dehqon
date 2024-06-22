<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyCodeRequest;
use App\Models\Auth\PhoneVerifyCode;
use App\Models\Auth\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VerifyCodeController extends Controller
{
    public function verifyCode(VerifyCodeRequest $request)
    {
        $is_verified = $this->getIfVerified($request);

        if ($is_verified) {
            $user = User::where('phone', $request->phone)->first();

            if ($user) {
                if ($user->role != 1) {
                    return redirect()->back()->with(['danger' => 'Нет доступа!']);
                }

                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->route('users.edit', $user->id);
            } else {
                return redirect()->route('login')->with(['danger' => 'Пользователь не зарегистрирован!']);
            }
        }

        return redirect()->back()->withErrors(['code' => 'Неверный код!'])->with(['phone' => $request->phone]);
    }



    public function getIfVerified($request)
    {
        $is_verified = PhoneVerifyCode::where([
            'phone' => $request->phone,
            'code' => $request->code,
        ])
            ->where('created_at', '>', Carbon::now()
                ->subMinutes(3)
                ->toDateTimeString())
            ->orderBy('created_at', 'desc')->first();

        return $is_verified;
    }
}
