<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function reset(ResetPasswordRequest $request)
    {
        $user = Auth::user();
        $user->update(['password' => bcrypt($request->password)]);
        $user->tokens()->delete();

        $token = $user->createToken('access_token');

        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
        ], 201);
    }
}
