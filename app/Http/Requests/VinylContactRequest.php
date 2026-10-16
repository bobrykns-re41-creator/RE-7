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
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Будь ласка, вкажіть ваше ім\'я.',
            'email.required' => 'Email є обов\'язковим для зворотного зв\'язку.',
            'email.email' => 'Введіть коректну адресу електронної пошти.',
            'message.required' => 'Напишіть текст вашого запиту.',
            'message.min' => 'Повідомлення має містити хоча б 10 символів.',
        ];
    }
}
