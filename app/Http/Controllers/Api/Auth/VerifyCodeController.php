<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Auth\VerifyCodeRequest;
use App\Models\Auth\PhoneVerifyCode;
use App\Models\Auth\RegisterToken;
use App\Models\Auth\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VerifyCodeController extends Controller
{
    public function verifyCode(VerifyCodeRequest $request)
    {
        if (!$this->getIfVerified($request)) {
            return response()->json(['message' => 'Invalid code'], 422);
        }

        $request->merge(['token' => Str::random(64)]);
        RegisterToken::create($request->all());
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            $user->tokens()->delete();
            $token = $user->createToken('access_token');

            return response()->json([
                'message' => 'Verified',
                'access_token' => $token->plainTextToken,
            ], 201);
        }

        return response()->json(['register_token' => $request->token], 201);
    }


    public function getIfVerified($request)
    {
        $is_verified = PhoneVerifyCode::where([
            'phone' => $request->phone,
            'code' => $request->code,
        ])
            ->where('created_at', '>', Carbon::now()
                ->subMinutes(2)
                ->toDateTimeString())
            ->orderBy('created_at', 'desc')->first();

        return $is_verified;
    }

}
