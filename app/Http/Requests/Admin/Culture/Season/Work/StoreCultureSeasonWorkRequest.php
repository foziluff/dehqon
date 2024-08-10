<?php

namespace App\Http\Requests\Admin\Culture\Season\Work;

use Illuminate\Foundation\Http\FormRequest;

class StoreCultureSeasonWorkRequest extends FormRequest
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
            'time'              => 'required|string|max:255',
            'work_ru'              => 'required|string|max:255',
            'work_uz'              => 'required|string|max:255',
            'work_tj'              => 'required|string|max:255',
            'culture_season_id' => 'required|exists:culture_seasons,id',
        ];
    }
}
