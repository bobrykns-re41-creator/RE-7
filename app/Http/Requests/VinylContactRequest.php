<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinylContactRequest extends FormRequest
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
            'phone' => ['required', 'string', 'regex:/^\+380\d{9}$/'],
            'budget' => ['nullable', 'integer', 'between:500,50000'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Будь ласка, вкажіть ваше ім\'я.',
            'email.required' => 'Email є обов\'язковим для зворотного зв\'язку.',
            'email.email' => 'Введіть коректну адресу електронної пошти.',

            'phone.required' => 'Номер телефону є обов\'язковим.',
            'phone.regex' => 'Телефон має бути у форматі +380XXXXXXXXX.',
            'budget.integer' => 'Бюджет має бути цілим числом.',
            'budget.between' => 'Бюджет має становити від 500 до 50 000 грн.',

            'message.required' => 'Напишіть текст вашого запиту.',
            'message.min' => 'Повідомлення має містити хоча б 10 символів.',
        ];
    }
}
