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
            'price_from' => ['numeric', 'min:0', 'nullable'],
            'price_to'   => ['numeric', 'min:0', 'required_if:price_from'],
        ];
    }
}
