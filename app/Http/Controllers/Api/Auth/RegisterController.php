<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\UserPhotoPathAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterNewUserRequest;
use App\Models\Auth\RegisterToken;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     operationId="registerUser",
     *     tags={"Auth"},
     *     summary="Register a new user",
     *     description="Register a new user and return an access token upon successful registration.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"name", "surname", "phone", "born_in", "password", "gender", "currency", "register_token"},
     *                 @OA\Property(property="name", type="string", description="User's first name", example="Абдураззок"),
     *                 @OA\Property(property="surname", type="string", description="User's last name", example="Фозилов"),
     *                 @OA\Property(property="phone", type="string", description="User's phone number in the format 992XXXXXXXXX", example="992123456789"),
     *                 @OA\Property(property="born_in", type="string", format="date", description="User's birth date in YYYY-MM-DD format", example="1990-01-01"),
     *                 @OA\Property(property="password", type="string", description="User's password", example="123123123"),
     *                 @OA\Property(property="gender", type="integer", description="User's gender (e.g., 1 for male, 2 for female)", example=1),
     *                 @OA\Property(property="currency", type="string", description="Preferred currency code", example="USD"),
     *                 @OA\Property(
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                     description="Optional user's profile image"
     *                 ),
     *                 @OA\Property(property="register_token", type="string", description="Registration token to verify the user", example="abcdef123456")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User registered successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."),
     *             @OA\Property(property="token_type", type="string", example="Bearer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error or invalid token",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Invalid token"),
     *             @OA\Property(property="errors", type="object", description="Validation errors")
     *         )
     *     )
     * )
     */
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
