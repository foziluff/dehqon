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
            'consumption_category_id'           => 'required|exists:consumption_categories,id',
            'consumption_operation_id'          => 'required|exists:consumption_operations,id',
            'consumption_production_mean_id'    => 'required|exists:consumption_production_means,id',
            'consumption_naming_id'             => 'required|exists:consumption_namings,id',
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
