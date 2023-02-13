<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->getMethod() == 'POST') {
            $rules = [
                'category_name' => 'required | unique:table_category,category_name',
                'category_desc' => 'required'
            ];
        }

        if ($this->getMethod() == 'PUT') {
            $rules = [
                'category_name' => ['required', Rule::unique('table_category')->ignore($this->category, 'category_id')],
                'category_desc' => 'required'
            ];
        }

        return $rules;
    }
}
