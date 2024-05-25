<?php

namespace App\Http\Requests\Admin\Conversion\Consumption;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConversionConsumptionRequest extends FormRequest
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
            'date'                          => 'required|date',
            'conversion_id'                 => 'required|exists:conversions,id',
            'product_type_id'               => 'required|exists:product_types,id',
            'culture_id'                    => 'required|exists:cultures,id',
            'conversion_type_id'            => 'required|exists:conversion_types,id',
            'conversion_category_id'        => 'required|exists:conversion_categories,id',
            'conversion_operation_id'       => 'required|exists:conversion_operations,id',
            'conversion_production_mean_id' => 'required|exists:conversion_production_means,id',
            'conversion_naming_id'          => 'required|exists:conversion_namings,id',
            'quantity'                      => 'required|integer',
            'quantity_unit'                 => 'required|string|max:255',
            'price'                         => 'required|numeric',
        ];
    }
}
