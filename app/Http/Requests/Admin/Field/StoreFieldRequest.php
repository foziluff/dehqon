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
            'sort'                      => 'required|string|max:255',
            'area'                      => 'required|numeric|min:0',
            'fuel_type_id'              => 'required|exists:fuel_types,id',
            'sowing_year'               => 'required|integer|min:1900|max:'.(date('Y')),
            'prev_culture_id'           => 'nullable|exists:cultures,id',
            'prev_sort'                 => 'nullable|string|max:255',
            'prev_sowing_year'          => 'nullable|integer|min:1900|max:'.(date('Y')),
            'coordinates'               => 'required|array|min:1',
            'coordinates.0'             => 'required|string',
        ];
    }
}
