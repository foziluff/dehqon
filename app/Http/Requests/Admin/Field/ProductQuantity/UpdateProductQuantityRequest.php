<?php

namespace App\Http\Requests\Admin\Field\ProductQuantity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductQuantityRequest extends FormRequest
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
            'field_id'                          => 'required|exists:fields,id',
            'product_type_id'                   => 'required|exists:product_types,id',
            'culture_id'                        => 'required|exists:cultures,id',
            'quantity'                          => 'required|numeric|min:0',
            'quantity_unit'                     => 'required|string|max:255',
        ];
    }
}
