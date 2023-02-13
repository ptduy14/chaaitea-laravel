<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateFormRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric|digits:9',
            'city' => 'required|not_in:0',
            'district' => 'required|not_in:0',
            'ward' => 'required|not_in:0',
            'street_name' => 'required',
            'gender' => 'required',
            'img-upload' => '|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
