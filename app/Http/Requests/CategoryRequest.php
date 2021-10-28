<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:255|unique:categories,name',
            'description' => 'required|min:5',
        ];

        if ($this->route()->named('admin.categories.update')) {
            $rules['name'] .= ',' . $this->route()->parameter('category')->id;
        }
        return $rules;
    }

    public function messages()
    {
        return
        [
            'required' => 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute д олжно иметь минимум :min символов',
            'unique' => 'Такая категория уже создана',
        ];
    }
}
