<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailFormRequest extends FormRequest
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
            $rules = [
                'product_detail_intro' => 'required',
                'product_detail_desc' => 'required',
                'product_detail_weight' => 'required | integer',
                'product_detail_mfg' => 'required',
                'product_detail_exp' => 'required | integer',
                'product_detail_origin' => 'required',
                'product_detail_manual' => 'required'
            ];
            
        return $rules;
    }
}
