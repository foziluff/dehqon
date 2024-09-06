<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'name'                  => 'sometimes|string|max:255',
            'surname'               => 'sometimes|string|max:255',
            'phone'                 => ['sometimes', 'string', 'regex:/^992\s?\d{9}$/'],
            'born_in'               => 'sometimes|date',
            'organization_id'       => 'sometimes|nullable|integer',
            'password'              => 'sometimes|nullable|min:9|max:20',
            'gender'                => 'sometimes|integer|in:0,1',
            'currency'              => 'sometimes|string|max:255',
            'image'                 => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'device'                => 'sometimes|nullable|string|max:255',
            'role'                  => 'sometimes|nullable|integer',
        ];
    }
}
