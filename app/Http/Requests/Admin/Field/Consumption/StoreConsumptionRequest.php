<?php

namespace App\Http\Requests\Admin\Field\Consumption;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsumptionRequest extends FormRequest
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
            'date'                              => 'required|date',
//            'field_id'                          => 'required|exists:fields,id',
            'product_type_id'                   => 'required|exists:product_types,id',
            'culture_id'                        => 'required|exists:cultures,id',
//            'consumption_category_id'           => 'required|exists:consumption_categories,id',
//            'consumption_operation_id'          => 'required|exists:consumption_operations,id',
            'consumption_category'              => 'required|string|max:255',
            'consumption_operation'             => 'required|string|max:255',
            'consumption_production_mean_id'    => 'required|exists:consumption_production_means,id',
            'consumption_naming_id'             => 'sometimes|nullable|exists:consumption_namings,id',
            'consumption_naming'                => 'sometimes|nullable|string|max:255',
            'stock_consumption_id'              => 'sometimes|nullable|exists:stock_consumptions,id', //null

            'quantity'                          => 'required|numeric|min:0',
            'quantity_unit'                     => 'required|string|max:255',
            'price'                             => 'required|numeric|min:0',
            'field_id'              => ['required',
                function ($attribute, $value, $fail) {
                    if (!auth()->user()->fields()->where('id', $value)->exists()) {
                        $fail('Выбранное поле недоступно для этого пользователя.');
                    }
                },
            ],
        ];
    }
}
