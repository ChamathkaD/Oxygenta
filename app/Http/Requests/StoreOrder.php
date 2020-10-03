<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'nic' => 'required|regex:/^[0-9]{9}[vVxX]$/',
            'gender' => 'required|string',
            'dob' => 'required|date|date_format:Y-m-d|before:13 years ago',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip' => 'required|numeric',
            'country' => 'required|string',
            'phone' => 'required|digits:10|numeric',
            'email' => 'required|email|string|max:255',
            'attachment' => 'required',
            'attachment.*' => 'bail|image|mimes:jpeg,png,jpg,gif,svg,bmp',
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
            'email.required' => 'Please enter your email.',
            'dob.required' => 'Please enter your birthday.',
            'gender.required' => 'Please select your gender.',
            'nic.required' => 'Please enter your NIC or Passport number.',
            'dob.date_format' => 'The birthday does not match the format YYYY-MM-DD. (Ex: 1995-06-25)',
            'dob.before' => 'You must be at least 13 years old',
            'attachment.mimes' => 'The attachments must be a file of type: jpeg, png, jpg, gif, svg or bmp only.',
            'attachment.image' => 'The attachments must be a image.',
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
