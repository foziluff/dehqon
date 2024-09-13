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
            'date'                      => 'sometimes|date',
//            'work_id'                   => 'sometimes|exists:works,id',
            'work_plan_id'              => 'sometimes|exists:work_plans,id',
            'material'                  => 'sometimes|string',
            'work'                      => 'sometimes|string',
            'done'                      => 'sometimes|in:0,1',
            'material_quantity'         => 'sometimes|numeric',
            'material_quantity_unit'    => 'sometimes|string',
        ];
    }
}
