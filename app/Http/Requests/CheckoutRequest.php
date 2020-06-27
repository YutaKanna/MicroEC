<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'order_ship.name' => 'required',
            'order_ship.email' => 'required|email',
            'order_ship.address' => 'required',
            'order_ship.city' => 'required',
            'order_ship.province' => 'required',
            'order_ship.postal_code' => 'required',
            'order_ship.phone' => 'required',
        ];
    }
}
