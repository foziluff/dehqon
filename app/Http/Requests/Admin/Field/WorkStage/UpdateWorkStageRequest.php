<?php

namespace App\Http\Requests\Admin\Field\WorkStage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkStageRequest extends FormRequest
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
            'date'                      => 'required|date',
            'work_id'                   => 'required|exists:works,id',
            'work_plan_id'              => 'required|exists:work_plans,id',
            'material'                  => 'required|string',
            'material_quantity'         => 'required|numeric',
            'material_quantity_unit'    => 'required|string',
        ];
    }
}
