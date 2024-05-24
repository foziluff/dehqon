<?php

namespace App\Http\Requests\Admin\Stock;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockRequest extends FormRequest
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
            'date'          => 'required|date',
            'title'         => 'required|string|max:255',
            'quantity'      => 'required|numeric|min:0',
            'quantity_unit' => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'consumption_production_mean_id' => 'required|exists:consumption_production_means,id',
        ];
    }
}
