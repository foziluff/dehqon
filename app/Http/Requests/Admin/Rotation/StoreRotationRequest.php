<?php

namespace App\Http\Requests\Admin\Rotation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRotationRequest extends FormRequest
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
            'field_id'              => 'required|exists:fields,id',
            'culture_id'            => 'required|exists:cultures,id',
            'culture_sort'          => 'required|string',
            'sowing_date'           => 'required|date',
            'harvesting_date'       => 'required|date|after_or_equal:sowing_date',
            'average_yield'         => 'required|numeric|min:0',
            'average_yield_unit'    => 'required|string',
        ];
    }
}
