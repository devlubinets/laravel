<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\Cast\Bool_;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name'  => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:3', 'max:255'],
            'phone' => [
                'required',
                'min:3',
            ],
        ];

        return $rules;
    }

    public function messages(): array
    {
        return
            [
                'required' => 'Поле :attribute обязательно для ввода',
                'min'      => 'Поле :attribute должно иметь минимум :min символов',
                'max'      => 'Поле :attribute должно иметь максимум :max символов',
//                'numeric' => 'Поле :attribute должно содержать только числа',
            ];
    }
}
