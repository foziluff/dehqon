<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UpdateUsersRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Auth\User;
use App\Repositories\Users\UsersRepository;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $usersRepository;

    public function __construct()
    {
        parent::__construct();
        $this->usersRepository = app(UsersRepository::class);
    }
    public function login(LoginRequest $request)
    {
        $is_registered = User::where('phone', '=', $request->phone)->first();

        if ($is_registered){

            if (Auth::attempt($request->only('phone', 'password'))) {

                $user = Auth::user();
                $user->tokens()->delete();
                $token = $user->createToken('access_token');

                return response()->json([
                    'access_token' => $token->plainTextToken,
                    'token_type' => 'Bearer',
                ], 201);
            }

            return response()->json(['message' => 'Invalid password',], 406);
        }

        return response()->json(['message' => 'Not registered',], 400);
    }

    public function getUser()
    {
        return response()->json(User::find(Auth::user()->id));
    }

    public function update(UpdateUsersRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->usersRepository->selfUpdate($this->user->id, $request->only('name', 'surname', 'born_in', 'organization_id', 'gender', 'currency', 'image_path', 'fcm_token'));
        return response()->json($record);
    }

}
