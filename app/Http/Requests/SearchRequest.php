<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:64'],
            'material' => ['nullable', 'string', 'max:64'],
            'brand' => ['nullable', 'string', 'max:64'],
            'mincost' => ['nullable', 'integer', 'min:0'],
            'maxcost' => ['nullable', 'integer', 'min:0'],
            'client_name' => ['nullable', 'string', 'max:64'],
            'order_id' => [ 'nullable', 'integer', 'exists:order,order_id'],
            'sort' => ['nullable', 'string', 'max:64'],
        ];
    }
}
