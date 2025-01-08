<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFertilizerRequest extends FormRequest
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
            'title_ru'         => 'required|string|max:255',
            'title_uz'         => 'required|string|max:255',
            'title_tj'         => 'required|string|max:255',
            'description_ru'   => 'required|string',
            'description_uz'   => 'required|string',
            'description_tj'   => 'required|string',
        ];
    }
}
