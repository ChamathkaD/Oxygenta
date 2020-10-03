<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
        return [
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|string|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|string|max:255',
            'email' => 'email|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip' => 'required|numeric',
            'country' => 'required|string',
            'phone' => 'required|digits:10|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Please enter your first Name.',
            'first_name.regex' => 'Please enter your valid first Name.',
            'last_name.required' => 'Please enter your last Name.',
            'last_name.regex' => 'Please enter your valid last Name.',
            'phone.required' => 'Please enter your mobile number.',
            'phone.digits' => 'Your phone number must be 10 digits and enter valid phone number.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email address',
            'phone' => 'phone number',
        ];
    }
}
