<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
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
                'product_name' => 'required | unique:table_category,category_name',
                'product_price' => 'required | integer'
            ];
        }

        if ($this->getMethod() == 'PUT') {
            $rules = [
                'product_name' => ['required', Rule::unique('table_product')->ignore($this->product, 'product_id')],
                'product_price' => 'required | integer'
            ];
        }

        return $rules;
    }
}
