<?php

namespace App\Http\Requests\Admin\ProtectiveEquipment;

use Illuminate\Foundation\Http\FormRequest;

class StoreProtectiveEquipmentItemRequest extends FormRequest
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
            'title_ru' => 'required|string|max:100',
            'title_uz' => 'required|string|max:100',
            'title_tj' => 'required|string|max:100',
            'description_ru' => 'required|string',
            'description_uz' => 'required|string',
            'description_tj' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            'front_key' => 'sometimes|nullable|string|max:255',
            'protective_equipment_id' => 'required|exists:protective_equipments,id|integer',
        ];
    }
}
