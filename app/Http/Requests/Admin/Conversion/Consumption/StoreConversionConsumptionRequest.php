<?php

namespace App\Http\Requests\Admin\Conversion\Consumption;

use Illuminate\Foundation\Http\FormRequest;

class StoreConversionConsumptionRequest extends FormRequest
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
//            'conversion_type_id'            => 'required|exists:conversion_types,id',
//            'conversion_category_id'        => 'required|exists:conversion_categories,id',
//            'conversion_operation_id'       => 'required|exists:conversion_operations,id',
            'consumption_production_mean_id' => 'required|exists:consumption_production_means,id',
            'stock_consumption_id'              => 'sometimes|nullable|exists:stock_consumptions,id',
//            'conversion_naming_id'          => 'required|exists:conversion_namings,id',
            'conversion_type'                 => 'required|string|max:255',
            'conversion_category'                 => 'required|string|max:255',
            'conversion_operation'                 => 'required|string|max:255',
            'conversion_naming'                 => 'required|string|max:255',
            'quantity'                      => 'required|numeric',
            'quantity_unit'                 => 'required|string|max:255',
            'price'                         => 'required|numeric',
        ];
    }
}
