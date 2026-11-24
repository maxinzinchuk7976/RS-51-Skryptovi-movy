<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'regex:/^(?:\+38)?0\d{9}$/'],
            'address' => ['required', 'string', 'max:255'],
            'id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Ім\'я» не може бути порожнім.',
            'email.required' => 'Поле «Email» не може бути порожнім.',
            'phone.required' => 'Поле «Телефон» не може бути порожнім.',
            'address.required' => 'Поле «Адреса доставки» не може бути порожнім.',
            'email.email' => 'Email введено некоректно.',
            'phone.regex' => 'Номер телефону введено некоректно.'
        ];
    }
}
