<?php

namespace App\Http\Requests\Admin\Field;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends FormRequest
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
            'title'                     => 'sometimes|string|max:255',
            'culture_id'                => 'sometimes|exists:cultures,id',
            'sort'                      => 'sometimes|nullable|string|max:255',
            'area'                      => 'sometimes|numeric|min:0',
            'irrigation_id'             => 'sometimes|exists:irrigations,id',
            'sowing_year'               => 'sometimes|integer|min:1900|max:'.(date('Y')),
            'prev_culture_id'           => 'sometimes|exists:cultures,id',
            'prev_sort'                 => 'sometimes|string|max:255',
            'prev_sowing_year'          => 'sometimes|integer|min:1900|max:'.(date('Y')),
            'coordinates'               => 'sometimes|string',

            'front_key'                 => 'sometimes|nullable|string|max:255',
        ];
    }
}
