<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddress extends FormRequest
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
            'country' => 'required',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip' => 'required|numeric',
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
            'country.required' => 'Please select your country.',
            'state.required' => 'Please enter your state.',
            'city.required' => 'Please enter your city.',
            'street.required' => 'Please enter your street.',
            'zip.required' => 'Please enter your zip code or postal code.',
            'phone.required' => 'Please enter your phone number.',
            'zip.numeric' => 'Please enter your valid zip code or postal code.',
            'phone.digits' => 'Your phone number must be 10 digits and enter valid phone number.',
        ];
    }
}
