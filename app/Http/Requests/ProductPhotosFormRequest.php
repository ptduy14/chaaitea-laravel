<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPhotosFormRequest extends FormRequest
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
        return [
            'product_photo_1st' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'product_photo_2nd' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'product_photo_3rd' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'product_photo_4th' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
