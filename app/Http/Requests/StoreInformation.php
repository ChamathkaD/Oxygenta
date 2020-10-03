<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformation extends FormRequest
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
            'title' => 'required',
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|string|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|string|max:255',
            'phone' => 'required|digits:10|numeric',
            'email' => 'required|email|string|max:255',
            'dob' => 'required|date|date_format:Y-m-d|before:13 years ago',
            'gender' => 'required',
            'nic' => 'required|regex:/^[0-9]{9}[vVxX]$/',
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
            'title.required' => 'Please select your title.',
            'first_name.required' => 'Please enter your First Name.',
            'first_name.regex' => 'Please enter your valid First Name.',
            'last_name.required' => 'Please enter your Last Name.',
            'last_name.regex' => 'Please enter your valid last Name.',
            'phone.required' => 'Please enter your mobile number.',
            'email.required' => 'Please enter your email.',
            'dob.required' => 'Please enter your birthday.',
            'gender.required' => 'Please select your gender.',
            'nic.required' => 'Please enter your NIC or Passport number.',
            'dob.date_format' => 'The birthday does not match the format YYYY-MM-DD. (Ex: 1995-06-25)',
            'dob.before' => 'You must be at least 13 years old',
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
            'dob' => 'birthday',
        ];
    }
}
