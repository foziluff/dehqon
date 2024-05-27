<?php

namespace App\Http\Requests\Admin\Conversion\Quantity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConversionQuantityRequest extends FormRequest
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
            'date'                  => 'required|date',
            'conversion_id'         => 'required|exists:conversions,id',
            'conversion_type_id'    => 'required|exists:conversion_types,id',
            'conversion_naming_id'  => 'required|exists:conversion_namings,id',
            'quantity'              => 'required|integer',
            'quantity_unit'         => 'required|string|max:255',
        ];
    }
}
