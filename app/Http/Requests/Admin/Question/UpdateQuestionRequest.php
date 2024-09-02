<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'question_ru'  => 'required|string|max:255',
            'question_uz'  => 'required|string|max:255',
            'question_tj'  => 'required|string|max:255',
            'answer_ru'    => 'required|string',
            'answer_uz'    => 'required|string',
            'answer_tj'    => 'required|string',
        ];
    }
}
