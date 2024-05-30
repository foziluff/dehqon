<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class VerifyCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone'      => 'required',
            'code'       => 'required|integer',
        ];
    }


    //    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json([
//            'errors' => $validator->errors()
//        ], 422));
//    }


    protected function failedValidation(Validator $validator)
    {
        $response = $this->expectsJson()
            ? new JsonResponse($validator->errors(), 422)
            : redirect()->back()->withErrors($validator)->withInput();

        throw new HttpResponseException($response);
    }
}
