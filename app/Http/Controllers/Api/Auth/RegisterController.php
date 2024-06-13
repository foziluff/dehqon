<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\UserPhotoPathAction;
use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Auth\RegisterNewUserRequest;
use App\Models\Auth\RegisterToken;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterNewUserRequest $request)
    {
        $registerToken = RegisterToken::where('phone', $request->phone)->latest()->first();
        if ($registerToken) $registerToken = $registerToken->token;

        if (!isset($request->register_token) || $request->register_token != $registerToken){
            return response()->json(['message' => 'Invalid token',], 422);
        }

        $request = (new UserPhotoPathAction())->handle($request);
        $request->merge(['password' => Hash::make($request->password)]);

        $request = $request->validated() + $request->only('image_path');
        $user = User::create($request);
        $token = $user->createToken('access_token');

        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
        ], 201);
    }
}
