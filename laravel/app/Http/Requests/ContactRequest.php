<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-]{7,15}$/'],
            'email' => ['required', 'email', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            // в рефку на форму
            'phone.regex' => 'Телефон должен содержать только цифры, пробелы, тире и может начинаться с +',
        ];
    }
}
