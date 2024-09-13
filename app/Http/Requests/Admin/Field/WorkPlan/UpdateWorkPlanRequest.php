<?php

namespace App\Http\Requests\Admin\Field\WorkPlan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkPlanRequest extends FormRequest
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
            'title'     => 'required|string|max:255',
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
