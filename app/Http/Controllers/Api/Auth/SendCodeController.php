<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SendCodeRequest;
use App\Models\Auth\PhoneVerifyCode;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Http;

class SendCodeController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/send-code",
     *     operationId="sendCode",
     *     tags={"Auth"},
     *     summary="Send code to phone number",
     *     description="This endpoint sends a code to the specified phone number for authentication purposes.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="phone", type="string", description="Phone number in the format 992 XXXXXXXXX")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Code sent successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Code sent successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="errors", type="object", description="Validation errors")
     *         )
     *     )
     * )
     */
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
        $message = "Ваш код $request->code никому не сообщите!";

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
            return response()->json(['message' => 'Успешно отправлено!'], 201);
        } else {
            return response()->json(['message' => 'Ошибка отправки!'], 422);
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
    /**
     * @OA\Get(
     *     path="/api/check-phone/{phone}",
     *     summary="Check if a phone number exists in the database",
     *     description="Returns a message indicating whether the phone number exists in the database.",
     *     operationId="checkPhoneNumber",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *         name="phone",
     *         in="path",
     *         description="Phone number to check",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             example="992XXXXXXXXX"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Phone number exists in the database",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Phone number exists in the database.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Phone number does not exist in the database",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Phone number does not exist in the database.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid phone number format",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Invalid phone number format.")
     *         )
     *     )
     * )
     */

    public function check($phone)
    {
        $exists = User::where('phone', $phone)->exists();
        if ($exists) {
            return response()->json(['message' => 'Exists'], 200);
        } else {
            return response()->json(['message' => 'Not exists'], 404);
        }
    }


}
