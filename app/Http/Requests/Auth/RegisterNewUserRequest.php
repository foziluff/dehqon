<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterNewUserRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'surname'   => 'required|string|max:255',
            'phone'     => ['required', 'string', 'regex:/^992\s?\d{9}$/', 'unique:users'],
            'born_in'   => 'required|date',
            'password'  => 'sometimes|string|min:4',
            'gender'    => 'required|integer',
            'currency'  => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
