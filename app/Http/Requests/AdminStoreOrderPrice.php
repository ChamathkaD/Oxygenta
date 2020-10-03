<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreOrderPrice extends FormRequest
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
            'price' => 'required|numeric',
            'shipping' => 'required|numeric',
            'total' => 'required|numeric',
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
            'price.required' => 'Please enter the prescription price.',
            'shipping.required'  => 'Please enter the shipping charge.',
            'total.required'  => 'Please enter the total price.',
            'price.numeric' => 'Total must be numeric.',
            'shipping.numeric'  => 'Shipping charges must be numeric.',
            'total.numeric'  => 'Grand Total must be numeric.',
        ];
    }
}
