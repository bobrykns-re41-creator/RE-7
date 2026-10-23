<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinylRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'  => ['required', 'string', 'max:255'],
            'artist' => ['required', 'string', 'max:255'],
            'genre'  => ['required', 'string', 'max:100'],
            'year'   => ['required', 'integer', 'min:1920', 'max:' . date('Y')],
            'price'  => ['required', 'numeric', 'min:0'],
        ];
    }
}
