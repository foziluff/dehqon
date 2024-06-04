<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'name'                  => 'required|string|max:255',
            'surname'               => 'required|string|max:255',
            'phone'                 => ['required', 'string', 'regex:/^992\s?\d{9}$/','unique:users,phone'],
            'born_in'               => 'required|date',
            'organization_id'       => 'sometimes|nullable|integer',
            'password'              => 'required|string|min:8',
            'gender'                => 'required|integer|in:0,1',
            'currency'              => 'required|string|max:255',
            'image'                 => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'device'                => 'nullable|string|max:255',
            'role'                  => 'nullable|integer',
        ];
    }
}
