<?php

namespace App\Http\Requests\Admin\Field;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
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
            'title'                     => 'required|string|max:255',
            'culture_id'                => 'required|exists:cultures,id',
            'sort'                      => 'sometimes|nullable|string|max:255',
            'area'                      => 'required|numeric|min:0',
            'irrigation_id'             => 'required|exists:irrigations,id',
            'sowing_year'               => 'required|integer|min:1900|max:'.(date('Y')),
            'prev_culture_id'           => 'sometimes|nullable|exists:cultures,id',
            'prev_sort'                 => 'sometimes|nullable|string|max:255',
            'prev_sowing_year'          => 'sometimes|nullable|integer|min:1900|max:'.(date('Y')),
            'coordinates'               => 'required|string',

            'front_key'                 => 'sometimes|nullable|string|max:255',
        ];
    }
}
