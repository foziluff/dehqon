<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class LoginRequest extends FormRequest
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
            'phone'    => 'required|string|max:100',
            'password' => 'required|string|max:100'
        ];
    }

    public function messages()
    {
        return [
            'phone.required'    => 'Поле "Телефон" обязательно для заполнения.',
            'phone.string'      => 'Поле "Телефон" должно быть строкой.',
            'phone.max'         => 'Поле "Телефон" не должно превышать 100 символов.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string'   => 'Поле "Пароль" должно быть строкой.',
            'password.max'      => 'Поле "Пароль" не должно превышать 100 символов.'
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->expectsJson()
            ? new JsonResponse($validator->errors(), 422)
            : redirect()->back()->withErrors($validator)->withInput();

        throw new HttpResponseException($response);
    }

}
