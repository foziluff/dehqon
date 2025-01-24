<?php

namespace App\Http\Requests\Admin\ProtectiveEquipment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProtectiveEquipmentItemRequest extends FormRequest
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
            'title_ru' => 'sometimes|string|max:100',
            'title_uz' => 'sometimes|string|max:100',
            'title_tj' => 'sometimes|string|max:100',
            'description_ru' => 'sometimes|string',
            'description_uz' => 'sometimes|string',
            'description_tj' => 'sometimes|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',

            'front_key' => 'sometimes|nullable|string|max:255',
            'protective_equipment_id' => 'sometimes|exists:protective_equipments,id|integer',
        ];
    }
}
