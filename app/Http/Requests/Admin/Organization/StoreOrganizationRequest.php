<?php

namespace App\Http\Requests\Admin\Organization;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
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
            'title_ru'       => 'required|string|max:255',
            'title_uz'       => 'required|string|max:255',
            'title_tj'       => 'required|string|max:255',

            'description_ru' => 'required|string',
            'description_uz' => 'required|string',
            'description_tj' => 'required|string',

            'address_ru'     => 'required|string|max:255',
            'address_uz'     => 'required|string|max:255',
            'address_tj'     => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'required|email|max:255',
            'site'      => 'required|url|max:255',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
