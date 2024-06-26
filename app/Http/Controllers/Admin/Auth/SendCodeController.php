<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SendCodeRequest;
use App\Models\Auth\PhoneVerifyCode;
use Illuminate\Support\Facades\Http;

class SendCodeController extends Controller
{
    public function sendCode(SendCodeRequest $request)
    {
        $request->phone = substr($request->phone, 3);
        $request->merge(['code' => rand(1000, 9999)]);

        $login = env('OSONSMSLOGIN');
        $sender = env('OSONSMSSENDER');
        $hash = env('OSONSMSHASH');
        $server = env('OSONSMSSERVER');

        $txn_id = uniqid();
        $str_hash = hash('sha256', $txn_id.";".$login.";".$sender.";".$request->phone.";".$hash);
        $message = "Ваш код $request->code никому не сообщайте!";

        $params = [
            "from"          => $sender,
            "phone_number"  => $request->phone,
            "msg"           => $message,
            "str_hash"      => $str_hash,
            "txn_id"        => $txn_id,
            "login"         => $login,
        ];

        $result = $this->callApi($server, $params);

        if (!$result['error']) {
            PhoneVerifyCode::create($request->all());
            return redirect()->route('verify')->with(['phone' => '992'.$request->phone]);
        } else {
            return redirect()->back()->with(['send-danger' => 'Ошибка отправки!']);
        }
    }



    public static function callApi($url, $params)
    {
        $response = null;
        $error = null;

        try {
            $response = Http::get($url, $params);
            return ['error' => false, 'msg' => $response->body()];
        } catch (\Exception $e) {
            return ['error' => true, 'msg' => $e->getMessage()];
        }
    }

}
