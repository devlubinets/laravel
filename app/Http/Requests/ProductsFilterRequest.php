<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'price_from' => ['nullable', 'min:0', 'numeric'],
            'price_to'   => ['nullable', 'min:0', 'numeric'],
        ];
    }
}
