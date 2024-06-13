<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function reset(ResetPasswordRequest $request)
    {
        $this->user->update(['password' => bcrypt($request->password)]);
        $this->user->tokens()->delete();

        $token = $this->user->createToken('access_token');

        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
        ], 201);
    }
}
