<?php

namespace App\Http\Requests\Admin\Field\Note\NoteShow;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteShowRequest extends FormRequest
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
            'access'            => 'nullable|integer|min:0|max:100',
            'asked_for_user_id' => 'sometimes|exists:users,id',
            'asking_user_id'    => 'sometimes|exists:users,id|different:asked_for_user_id',
        ];
    }
}
