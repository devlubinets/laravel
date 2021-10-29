<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name'        => 'required|min:3|max:255|unique:categories,name',
            'description' => 'required|min:5',
        ];

        if ($this->route()->named('admin.categories.update')) {
            $rules['name'] .= ',' . $this->route()->parameter('category')->id;
        }
        return $rules;
    }

    public function messages(): array
    {
        return
        [
            'required' => 'Поле :attribute обязательно для ввода',
            'min'      => 'Поле :attribute д олжно иметь минимум :min символов',
            'unique'   => 'Такая категория уже создана',
        ];
    }
}
