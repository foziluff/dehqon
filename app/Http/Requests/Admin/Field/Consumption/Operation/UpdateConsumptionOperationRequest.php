<?php

namespace App\Http\Requests\Admin\Field\Consumption\Operation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsumptionOperationRequest extends FormRequest
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
        ];
    }
}
