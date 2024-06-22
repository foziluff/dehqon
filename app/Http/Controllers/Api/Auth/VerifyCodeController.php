<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyCodeRequest;
use App\Models\Auth\PhoneVerifyCode;
use App\Models\Auth\RegisterToken;
use App\Models\Auth\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VerifyCodeController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/verify-code",
     *     operationId="verifyCode",
     *     tags={"Auth"},
     *     summary="Verify the code sent to the user's phone",
     *     description="This endpoint verifies the code sent to the user's phone and issues a registration token or an access token if the user is already registered.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"phone", "code"},
     *             @OA\Property(property="phone", type="string", example="992123456789", description="Phone number in the format 992XXXXXXXXX"),
     *             @OA\Property(property="code", type="integer", example=123456, description="Verification code sent to the phone")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Code verified successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Verified"),
     *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."),
     *             @OA\Property(property="register_token", type="string", example="sample_register_token")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid code or validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Invalid code"),
     *             @OA\Property(property="errors", type="object", description="Validation errors")
     *         )
     *     )
     * )
     */
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
