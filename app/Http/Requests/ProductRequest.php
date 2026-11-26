<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:64'],
            'material' => ['required', 'string', 'max:64'],
            'brand' => ['required', 'string', 'max:64'],
            'cost' => ['required', 'integer', 'min:0'],
            'photo_path' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
        ];
    }
}
