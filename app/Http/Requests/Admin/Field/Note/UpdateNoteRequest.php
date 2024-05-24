<?php

namespace App\Http\Requests\Admin\Field\Note;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
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
            'field_id'      => 'sometimes|exists:fields,id',
            'date'          => 'required|date',
            'problem_id'    => 'required|exists:problems,id',
            'description'   => 'required|string|max:1000',
            'defeated_area' => 'required|numeric|min:0',
            'images.*'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
