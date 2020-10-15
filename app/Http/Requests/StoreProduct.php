<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'product_name'=>'required | max:50',
            'quantity'=>'required | integer',
            'qty_unit'=>'required | max:20',
            'price'=>'required | integer',
            'qty_price_per_unit'=>'required | max:20',
            'category'=>'required | max:50',
            'photos.*'=>'required|file|image|mimes:jpeg,png'
        ];
    }
}
