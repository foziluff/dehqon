<?php

namespace App\Http\Requests\Admin\Field\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
//            'field_id'      => 'required|exists:fields,id',
            'date'          => 'sometimes|nullable|date',
//            'problem_id'    => 'required|exists:problems,id',
            'problem'       => 'sometimes|nullable|string|max:255',
            'description'   => 'sometimes|nullable|string|max:1000',
            'organization_id'       => 'sometimes|nullable|integer',
            'defeated_area' => 'sometimes|nullable|numeric',
            'images.*'      => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'        => 'sometimes|integer',
            'user_seen'     => 'sometimes|integer',
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
