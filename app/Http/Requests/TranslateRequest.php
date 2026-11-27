<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TranslateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                'language' => ['required', 'string', 'size:2'],
                'material' => ['required', 'string', 'max:64'],
                'name' => ['required','string', 'max:64']
            ];
    }
}
