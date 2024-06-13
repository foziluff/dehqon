<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $is_registered = User::where('phone', '=', $request->phone)->first();

        if ($is_registered){

            if (Auth::attempt($request->all())) {

                $user = Auth::user();
                $user->tokens()->delete();
                $token = $user->createToken('access_token');

                return response()->json([
                    'access_token' => $token->plainTextToken,
                    'token_type' => 'Bearer',
                ], 201);
            }

            return response()->json(['message' => 'Invalid password',], 422);
        }

        return response()->json(['message' => 'Not registered',], 401);
    }
}
