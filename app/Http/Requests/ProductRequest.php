<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'code'        => ['required', 'min:3', 'max:255', 'unique:products'],
            'name'        => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5'],
            'price'       => ['required', 'numeric', 'min:1'],
            'count'       => ['required'],
            'image'       => [
                                'required',
                                'image',
                                'mimes:jpg,png,jpeg,svg',
                                'max:2048',
                                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                             ]
        ];

        if ($this->route()->named('admin.products.update')) {
            $rules['code'] = ['required', 'min:3', 'max:255', 'unique:products,code,' . $this->product->id];
        }

        return $rules;
    }

    public function messages(): array
    {
        return
        [
            'required' => 'Поле :attribute обязательно для ввода',
            'min'      => 'Поле :attribute должно иметь минимум :min символов',
            'unique'   => 'Такой товар уже создан',
        ];
    }
}
