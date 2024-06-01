<?php

namespace App\Http\Requests\Admin\AgroMarket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgroMarketRequest extends FormRequest
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
            'title'     => 'required|string|max:255',
            'address'   => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'required|email|max:255',
            'site'      => 'required|url|max:255',
            'image'     => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
