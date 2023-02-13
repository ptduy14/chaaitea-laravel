<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthCustomerFormRequest extends FormRequest
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
            'email' => 'required|email|max:255|regex:/(.*)@gmail\.com/i|unique:table_user,email',
            'phone' => 'required|numeric|digits:10',
            'city' => 'required|not_in:0',
            'district' => 'required|not_in:0',
            'ward' => 'required|not_in:0',
            'street_name' => 'required',
            'gender' => 'required',
            'password' => 'required|confirmed',
        ];
    }
}
