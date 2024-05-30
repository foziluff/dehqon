<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class SendCodeRequest extends FormRequest
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
            'phone' => ['required', 'string', 'regex:/^992\s?\d{9}$/'],
        ];
    }
    public function messages(): array
    {
        return [
            'phone.required' => 'Поле номер телефона обязательно для заполнения.',
            'phone.string' => 'Номер телефона должен быть строкой.',
            'phone.regex' => 'Неверный формат номера телефона. Пожалуйста, введите номер в формате 992 XXXXXXXXX.',
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
