<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\UserPhotoPathAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserUpdateRequest;

class UserUpdateController extends Controller
{
    public function update(UserUpdateRequest $request)
    {
        $request = (new UserPhotoPathAction())->handle($request);
        $this->user->update($request->except('password'));
        return response()->json($this->user, 200);
    }

}
